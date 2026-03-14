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
        Schema::create('problem_sections', function (Blueprint $table) {
            $table->id();
            $table->text('badge_en')->nullable();
            $table->text('badge_bn')->nullable();
            $table->text('title_en')->nullable();
            $table->text('title_bn')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_bn')->nullable();

            // Problem 1
            $table->string('problem_1_title_en')->nullable();
            $table->string('problem_1_title_bn')->nullable();
            $table->text('problem_1_description_en')->nullable();
            $table->text('problem_1_description_bn')->nullable();
            $table->string('problem_1_icon')->nullable();

            // Problem 2
            $table->string('problem_2_title_en')->nullable();
            $table->string('problem_2_title_bn')->nullable();
            $table->text('problem_2_description_en')->nullable();
            $table->text('problem_2_description_bn')->nullable();
            $table->string('problem_2_icon')->nullable();

            // Problem 3
            $table->string('problem_3_title_en')->nullable();
            $table->string('problem_3_title_bn')->nullable();
            $table->text('problem_3_description_en')->nullable();
            $table->text('problem_3_description_bn')->nullable();
            $table->string('problem_3_icon')->nullable();

            // Problem 4
            $table->string('problem_4_title_en')->nullable();
            $table->string('problem_4_title_bn')->nullable();
            $table->text('problem_4_description_en')->nullable();
            $table->text('problem_4_description_bn')->nullable();
            $table->string('problem_4_icon')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('problem_sections');
    }
};
