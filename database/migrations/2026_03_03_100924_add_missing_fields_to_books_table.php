<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('books', function (Blueprint $table) {
            // Add only missing columns
            if (!Schema::hasColumn('books', 'size')) {
                $table->string('size')->default('medium')->after('category');
            }
            if (!Schema::hasColumn('books', 'isbn')) {
                $table->string('isbn')->nullable()->after('size');
            }
            if (!Schema::hasColumn('books', 'publication_date')) {
                $table->date('publication_date')->nullable()->after('isbn');
            }
            if (!Schema::hasColumn('books', 'tags')) {
                $table->json('tags')->nullable()->after('pdf_file');
            }
            if (!Schema::hasColumn('books', 'featured')) {
                $table->boolean('featured')->default(false)->after('tags');
            }
            if (!Schema::hasColumn('books', 'published')) {
                $table->boolean('published')->default(true)->after('featured');
            }
            if (!Schema::hasColumn('books', 'user_id')) {
                $table->foreignId('user_id')->nullable()->after('published');
            }
            if (!Schema::hasColumn('books', 'rating')) {
                $table->decimal('rating', 3, 2)->default(0)->after('views');
            }
            if (!Schema::hasColumn('books', 'rating_count')) {
                $table->integer('rating_count')->default(0)->after('rating');
            }
            if (!Schema::hasColumn('books', 'published_year')) {
                $table->integer('published_year')->nullable()->after('rating_count');
            }
            if (!Schema::hasColumn('books', 'file_size')) {
                $table->decimal('file_size', 8, 2)->nullable()->after('published_year');
            }
            
            // Add indexes if they don't exist
            $table->index('published');
            $table->index('featured');
            $table->index('category');
            $table->index('language');
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropIndex(['slug', 'published', 'featured', 'category', 'language', 'user_id']);
            $table->dropColumn([
                'content',
                'author_title', 
                'slug',
                'size',
                'isbn',
                'publication_date',
                'tags',
                'featured',
                'published',
                'user_id',
                'rating',
                'rating_count',
                'published_year',
                'file_size'
            ]);
        });
    }
};
