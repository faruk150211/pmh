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
        Schema::create('solution_sections', function (Blueprint $table) {
            $table->id();

            // Bilingual badge
            $table->string('badge_en')->nullable();
            $table->string('badge_bn')->nullable();

            // Bilingual title
            $table->string('title_en')->nullable();
            $table->string('title_bn')->nullable();

            // Bilingual description
            $table->text('description_en')->nullable();
            $table->text('description_bn')->nullable();

            // Solution 1
            $table->string('solution_1_title_en')->nullable();
            $table->string('solution_1_title_bn')->nullable();
            $table->text('solution_1_description_en')->nullable();
            $table->text('solution_1_description_bn')->nullable();
            $table->string('solution_1_icon')->nullable();

            // Solution 2
            $table->string('solution_2_title_en')->nullable();
            $table->string('solution_2_title_bn')->nullable();
            $table->text('solution_2_description_en')->nullable();
            $table->text('solution_2_description_bn')->nullable();
            $table->string('solution_2_icon')->nullable();

            // Solution 3
            $table->string('solution_3_title_en')->nullable();
            $table->string('solution_3_title_bn')->nullable();
            $table->text('solution_3_description_en')->nullable();
            $table->text('solution_3_description_bn')->nullable();
            $table->string('solution_3_icon')->nullable();

            // Solution 4
            $table->string('solution_4_title_en')->nullable();
            $table->string('solution_4_title_bn')->nullable();
            $table->text('solution_4_description_en')->nullable();
            $table->text('solution_4_description_bn')->nullable();
            $table->string('solution_4_icon')->nullable();

            // Solution 5
            $table->string('solution_5_title_en')->nullable();
            $table->string('solution_5_title_bn')->nullable();
            $table->text('solution_5_description_en')->nullable();
            $table->text('solution_5_description_bn')->nullable();
            $table->string('solution_5_icon')->nullable();

            // Solution 6
            $table->string('solution_6_title_en')->nullable();
            $table->string('solution_6_title_bn')->nullable();
            $table->text('solution_6_description_en')->nullable();
            $table->text('solution_6_description_bn')->nullable();
            $table->string('solution_6_icon')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solution_sections');
    }
};
