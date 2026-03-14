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
        Schema::create('how_it_works_sections', function (Blueprint $table) {
            $table->id();

            // Bilingual badge and title
            $table->string('badge_en')->nullable();
            $table->string('badge_bn')->nullable();

            $table->string('title_en')->nullable();
            $table->string('title_bn')->nullable();

            $table->text('description_en')->nullable();
            $table->text('description_bn')->nullable();

            // Step 1
            $table->string('step_1_title_en')->nullable();
            $table->string('step_1_title_bn')->nullable();
            $table->text('step_1_description_en')->nullable();
            $table->text('step_1_description_bn')->nullable();
            $table->string('step_1_icon')->nullable();

            // Step 2
            $table->string('step_2_title_en')->nullable();
            $table->string('step_2_title_bn')->nullable();
            $table->text('step_2_description_en')->nullable();
            $table->text('step_2_description_bn')->nullable();
            $table->string('step_2_icon')->nullable();

            // Step 3
            $table->string('step_3_title_en')->nullable();
            $table->string('step_3_title_bn')->nullable();
            $table->text('step_3_description_en')->nullable();
            $table->text('step_3_description_bn')->nullable();
            $table->string('step_3_icon')->nullable();

            // Step 4
            $table->string('step_4_title_en')->nullable();
            $table->string('step_4_title_bn')->nullable();
            $table->text('step_4_description_en')->nullable();
            $table->text('step_4_description_bn')->nullable();
            $table->string('step_4_icon')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('how_it_works_sections');
    }
};
