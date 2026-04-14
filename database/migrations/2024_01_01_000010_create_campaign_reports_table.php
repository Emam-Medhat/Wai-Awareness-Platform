<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('campaign_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campaign_id')->constrained('campaigns');
            $table->string('title');
            $table->json('report_data')->nullable();
            $table->bigInteger('reach')->default(0);
            $table->bigInteger('engagement')->default(0);
            $table->bigInteger('conversions')->default(0);
            $table->date('period_start');
            $table->date('period_end');
            $table->foreignId('created_by')->constrained('users');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('campaign_reports');
    }
};
