<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('body');
            $table->text('excerpt')->nullable();
            $table->string('image')->nullable();
            $table->string('slug')->unique();
            $table->foreignId('author_id')->constrained('users');
            $table->enum('author_type', ['doctor', 'psychologist', 'other'])->default('other');
            $table->enum('size', ['small', 'medium', 'large'])->default('medium');
            $table->string('category')->nullable();
            $table->json('tags')->nullable();
            $table->boolean('is_published')->default(false);
            $table->boolean('is_featured')->default(false);
            $table->bigInteger('views')->default(0);
            $table->integer('reading_time')->default(5);
            $table->timestamp('published_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
