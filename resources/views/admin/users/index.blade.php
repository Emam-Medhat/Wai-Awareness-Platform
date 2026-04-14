@extends('layouts.admin')

@section('title', 'إدارة المستخدمين')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <h1 class="h2 mb-0 fw-bold">
        <i class="fas fa-users ml-3 text-primary"></i>
        إدارة المستخدمين
    </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
            <i class="fas fa-user-plus ml-2"></i>
            إضافة مستخدم جديد
        </a>
    </div>
</div>

<div class="admin-card rounded-lg p-4" data-aos="fade-up">
    <!-- Search and Filter -->
    <div class="row mb-4">
        <div class="col-md-6">
            <form method="GET" action="{{ route('admin.users') }}">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" 
                           value="{{ request('search') }}" placeholder="البحث عن مستخدم...">
                    <button class="btn btn-outline-primary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
        <div class="col-md-6 text-md-end">
            <div class="btn-group">
                <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    <i class="fas fa-filter ml-2"></i>
                    فلترة حسب الدور
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('admin.users') }}">الكل</a></li>
                    <li><a class="dropdown-item" href="{{ route('admin.users') }}?role=admin">مديري النظام</a></li>
                    <li><a class="dropdown-item" href="{{ route('admin.users') }}?role=user">المستخدمين</a></li>
                    <li><a class="dropdown-item" href="{{ route('admin.users') }}?role=campaign_manager">مديري الحملات</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Users Table -->
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>المستخدم</th>
                    <th>التواصل</th>
                    <th>الدور</th>
                    <th>الحالة</th>
                    <th>تاريخ الإنشاء</th>
                    <th>إجراءات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            @if($user->avatar)
                                <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" 
                                     class="rounded-circle me-3" width="40" height="40">
                            @else
                                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3" 
                                     style="width: 40px; height: 40px;">
                                    {{ substr($user->first_name, 0, 1) }}{{ substr($user->last_name, 0, 1) }}
                                </div>
                            @endif
                            <div>
                                <div class="fw-bold">{{ $user->first_name }} {{ $user->last_name }}</div>
                                <small class="text-muted">{{ $user->city ?? 'غير محدد' }}</small>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="small">
                            <div class="text-muted">
                                <i class="fas fa-envelope ml-1"></i>
                                {{ $user->email }}
                            </div>
                            <div class="text-muted">
                                <i class="fas fa-phone ml-1"></i>
                                {{ $user->phone }}
                            </div>
                        </div>
                    </td>
                    <td>
                        @if($user->hasRole('admin'))
                            <span class="badge bg-danger">مدير نظام</span>
                        @elseif($user->hasRole('campaign_manager'))
                            <span class="badge bg-warning">مدير حملات</span>
                        @else
                            <span class="badge bg-primary">مستخدم</span>
                        @endif
                    </td>
                    <td>
                        @if($user->is_active)
                            <span class="badge bg-success">نشط</span>
                        @else
                            <span class="badge bg-secondary">غير نشط</span>
                        @endif
                    </td>
                    <td>
                        <small class="text-muted">{{ $user->created_at->format('Y-m-d') }}</small>
                    </td>
                    <td>
                        <div class="btn-group btn-group-sm">
                            <a href="{{ route('admin.users.show', $user) }}" class="btn btn-outline-primary" title="عرض">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-outline-warning" title="تعديل">
                                <i class="fas fa-edit"></i>
                            </a>
                            @if(!$user->hasRole('admin') || $user->id !== auth()->id())
                            <form method="POST" action="{{ route('admin.users.destroy', $user) }}" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger" title="حذف" 
                                        onclick="return confirm('هل أنت متأكد من حذف هذا المستخدم؟')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-5">
                        <i class="fas fa-users fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">لا يوجد مستخدمون</h5>
                        <p class="text-muted">ابدأ بإضافة مستخدم جديد</p>
                        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
                            <i class="fas fa-user-plus ml-2"></i>
                            إضافة مستخدم جديد
                        </a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    @if($users->hasPages())
    <div class="d-flex justify-content-center mt-4">
        {{ $users->links() }}
    </div>
    @endif
</div>
@endsection
