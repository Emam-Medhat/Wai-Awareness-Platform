<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('cover_image')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', ['draft', 'active', 'paused', 'completed'])->default('draft');
            $table->string('target_audience')->nullable();
            $table->json('platforms')->nullable();
            $table->text('goals')->nullable();
            $table->decimal('budget', 10, 2)->nullable();
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('manager_id')->nullable()->constrained('users');
            $table->bigInteger('views')->default(0);
            $table->bigInteger('engagement_count')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};
