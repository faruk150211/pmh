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
        Schema::create('hero_sections', function (Blueprint $table) {
            $table->id();
            $table->string('title_en')->nullable();
            $table->string('title_bn')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_bn')->nullable();
            $table->string('image')->nullable();
            $table->string('badge_1')->nullable();
            $table->string('badge_2')->nullable();
            $table->string('badge_3')->nullable();
            $table->string('stat_1_label_en')->nullable();
            $table->string('stat_1_label_bn')->nullable();
            $table->string('stat_1_value')->nullable();
            $table->string('stat_2_label_en')->nullable();
            $table->string('stat_2_label_bn')->nullable();
            $table->string('stat_2_value')->nullable();
            $table->string('stat_3_label_en')->nullable();
            $table->string('stat_3_label_bn')->nullable();
            $table->string('stat_3_value')->nullable();
            $table->string('emergency_hotline')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_sections');
    }
};
