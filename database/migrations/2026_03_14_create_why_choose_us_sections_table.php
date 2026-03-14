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
        Schema::create('why_choose_us_sections', function (Blueprint $table) {
            $table->id();

            // Bilingual badge and title
            $table->string('badge_en')->nullable();
            $table->string('badge_bn')->nullable();

            $table->string('title_en')->nullable();
            $table->string('title_bn')->nullable();

            // Why Choose Us Card 1
            $table->string('card_1_title_en')->nullable();
            $table->string('card_1_title_bn')->nullable();
            $table->text('card_1_description_en')->nullable();
            $table->text('card_1_description_bn')->nullable();
            $table->string('card_1_icon')->nullable();

            // Why Choose Us Card 2
            $table->string('card_2_title_en')->nullable();
            $table->string('card_2_title_bn')->nullable();
            $table->text('card_2_description_en')->nullable();
            $table->text('card_2_description_bn')->nullable();
            $table->string('card_2_icon')->nullable();

            // Why Choose Us Card 3
            $table->string('card_3_title_en')->nullable();
            $table->string('card_3_title_bn')->nullable();
            $table->text('card_3_description_en')->nullable();
            $table->text('card_3_description_bn')->nullable();
            $table->string('card_3_icon')->nullable();

            // Why Choose Us Card 4
            $table->string('card_4_title_en')->nullable();
            $table->string('card_4_title_bn')->nullable();
            $table->text('card_4_description_en')->nullable();
            $table->text('card_4_description_bn')->nullable();
            $table->string('card_4_icon')->nullable();

            // Stats Section
            $table->integer('stat_1_number')->nullable();
            $table->string('stat_1_label_en')->nullable();
            $table->string('stat_1_label_bn')->nullable();

            $table->integer('stat_2_number')->nullable();
            $table->string('stat_2_label_en')->nullable();
            $table->string('stat_2_label_bn')->nullable();

            $table->integer('stat_3_number')->nullable();
            $table->string('stat_3_label_en')->nullable();
            $table->string('stat_3_label_bn')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('why_choose_us_sections');
    }
};
