<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('campaign_contents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campaign_id')->constrained('campaigns');
            $table->string('title');
            $table->enum('type', ['image', 'video', 'document', 'text'])->default('text');
            $table->string('file_path')->nullable();
            $table->text('description')->nullable();
            $table->enum('platform', ['social', 'radio', 'tv', 'print', 'digital'])->default('digital');
            $table->timestamp('published_at')->nullable();
            $table->foreignId('created_by')->constrained('users');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('campaign_contents');
    }
};
