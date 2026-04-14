<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('video_url');
            $table->string('embed_url')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('slug')->unique();
            $table->integer('duration')->default(0);
            $table->enum('duration_type', ['short', 'medium', 'long'])->default('medium');
            $table->enum('category', ['psychology', 'thinking_anxiety', 'addiction', 'other'])->default('other');
            $table->foreignId('presenter_id')->constrained('users');
            $table->enum('presenter_type', ['doctor', 'psychologist', 'other'])->default('other');
            $table->boolean('is_published')->default(false);
            $table->boolean('is_featured')->default(false);
            $table->bigInteger('views')->default(0);
            $table->timestamp('published_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
