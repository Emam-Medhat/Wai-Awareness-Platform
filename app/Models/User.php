<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens, SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'phone',
        'email',
        'password',
        'role',
        'avatar',
        'city',
        'bio',
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_active' => 'boolean',
        'is_anonymous' => 'boolean',
    ];

    protected $appends = [
        'full_name',
        'avatar_url',
        'role_name',
    ];

    /**
     * Boot the model
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            if (empty($user->password)) {
                $user->password = bcrypt('password');
            }
        });

        static::updated(function ($user) {
            if ($user->isDirty('password')) {
                $user->password = bcrypt($user->password);
            }
        });
    }

    /**
     * Accessors
     */
    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function getAvatarUrlAttribute(): string
    {
        if ($this->avatar) {
            return asset('storage/' . $this->avatar);
        }
        
        return "https://ui-avatars.com/api/?name={$this->full_name}&background=2D5E3A&color=fff&size=200";
    }

    public function getRoleNameAttribute(): string
    {
        return get_user_role_name($this->role);
    }

    public function getGenderNameAttribute(): string
    {
        return $this->gender === 'male' ? 'ذكر' : 'أنثى';
    }

    /**
     * Relationships
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }

    public function publishedBooks(): HasMany
    {
        return $this->hasMany(Book::class)->where('is_published', true);
    }

    public function articles()
    {
        return $this->hasMany(Article::class, 'author_id');
    }

    public function videos()
    {
        return $this->hasMany(Video::class, 'presenter_id');
    }

    public function stories()
    {
        return $this->hasMany(Story::class);
    }

    public function habits()
    {
        return $this->hasMany(Habit::class);
    }

    public function futureMessages()
    {
        return $this->hasMany(FutureMessage::class);
    }

    public function createdCampaigns()
    {
        return $this->hasMany(Campaign::class, 'created_by');
    }

    public function managedCampaigns()
    {
        return $this->hasMany(Campaign::class, 'manager_id');
    }

    public function campaignContents()
    {
        return $this->hasMany(CampaignContent::class, 'created_by');
    }

    public function campaignReports()
    {
        return $this->hasMany(CampaignReport::class, 'created_by');
    }

    public function approvedStories()
    {
        return $this->hasMany(Story::class, 'approved_by');
    }

    public function approvedHabits()
    {
        return $this->hasMany(Habit::class, 'approved_by');
    }

    public function aiConversations()
    {
        return $this->hasMany(AiConversation::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    /**
     * Scopes
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function scopeByRole(Builder $query, string $role): Builder
    {
        return $query->where('role', $role);
    }

    public function scopeAdmins(Builder $query): Builder
    {
        return $query->where('role', 'admin');
    }

    public function scopeCampaignManagers(Builder $query): Builder
    {
        return $query->whereIn('role', ['admin', 'campaign_manager']);
    }

    public function scopeRegularUsers(Builder $query): Builder
    {
        return $query->where('role', 'user');
    }

    public function scopeByGender(Builder $query, string $gender): Builder
    {
        return $query->where('gender', $gender);
    }

    public function scopeFromCity(Builder $query, string $city): Builder
    {
        return $query->where('city', $city);
    }

    public function scopeSearch(Builder $query, string $term): Builder
    {
        return $query->where(function ($q) use ($term) {
            $q->where('first_name', 'LIKE', "%{$term}%")
              ->orWhere('last_name', 'LIKE', "%{$term}%")
              ->orWhere('email', 'LIKE', "%{$term}%")
              ->orWhere('phone', 'LIKE', "%{$term}%");
        });
    }

    /**
     * Methods
     */
    public function hasRole(string $role): bool
    {
        return $this->roles()->where('name', $role)->exists();
    }

    public function hasAnyRole(array $roles): bool
    {
        return $this->roles()->whereIn('name', $roles)->exists();
    }

    public function isAdmin(): bool
    {
        return $this->hasRole('admin');
    }

    public function isUser(): bool
    {
        return $this->hasRole('user');
    }

    public function assignRole(string $roleName): void
    {
        $role = Role::where('name', $roleName)->firstOrFail();
        $this->roles()->syncWithoutDetaching([$role->id]);
    }

    public function removeRole(string $roleName): void
    {
        $role = Role::where('name', $roleName)->firstOrFail();
        $this->roles()->detach($role->id);
    }

    public function syncRoles(array $roleNames): void
    {
        $roles = Role::whereIn('name', $roleNames)->pluck('id');
        $this->roles()->sync($roles);
    }

    public function isCampaignManager(): bool
    {
        return $this->role === 'campaign_manager' || $this->isAdmin();
    }

    public function canManageCampaigns(): bool
    {
        return $this->isCampaignManager();
    }

    public function canApproveContent(): bool
    {
        return $this->isCampaignManager();
    }

    public function canManageUsers(): bool
    {
        return $this->isAdmin();
    }

    public function deleteAvatar(): bool
    {
        if ($this->avatar && Storage::disk('public')->exists($this->avatar)) {
            Storage::disk('public')->delete($this->avatar);
        }
        
        return $this->update(['avatar' => null]);
    }

    public function getDashboardUrl(): string
    {
        if ($this->isAdmin()) {
            return route('admin.dashboard');
        }
        
        if ($this->isCampaignManager()) {
            return route('community.index');
        }
        
        return route('profile.show');
    }

    public function getUnreadNotificationsCount(): int
    {
        return $this->notifications()->where('read_at', null)->count();
    }

    public function markNotificationsAsRead(): int
    {
        return $this->notifications()->where('read_at', null)->update(['read_at' => now()]);
    }
}
