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
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address')->index();
            $table->text('user_agent')->nullable();
            $table->text('url');
            $table->text('referer')->nullable();
            $table->date('date')->index();
            $table->integer('visits')->default(1);
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('device')->nullable(); // mobile, desktop, tablet
            $table->string('browser')->nullable();
            $table->string('platform')->nullable();
            $table->timestamps();
            
            // Indexes for performance
            $table->index(['ip_address', 'date']);
            $table->index(['date', 'created_at']);
            $table->index('device');
            $table->index('browser');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitors');
    }
};
