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
        Schema::create('mission_and_vision', function (Blueprint $table) {
            $table->id();

            // Page Title Section
            $table->string('heading_en')->nullable();
            $table->string('heading_bn')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_bn')->nullable();

            // Mission Section
            $table->string('mission_heading_en')->nullable();
            $table->string('mission_heading_bn')->nullable();
            $table->longText('mission_content_en')->nullable();
            $table->longText('mission_content_bn')->nullable();
            $table->string('mission_image')->nullable();

            // Vision Section
            $table->string('vision_heading_en')->nullable();
            $table->string('vision_heading_bn')->nullable();
            $table->longText('vision_content_en')->nullable();
            $table->longText('vision_content_bn')->nullable();
            $table->string('vision_image')->nullable();

            // Commitment Section
            $table->string('commitment_heading_en')->nullable();
            $table->string('commitment_heading_bn')->nullable();
            $table->text('commitment_description_en')->nullable();
            $table->text('commitment_description_bn')->nullable();

            // Commitment Items (4 items)
            for ($i = 1; $i <= 4; $i++) {
                $table->string('commitment_' . $i . '_icon')->nullable();
                $table->string('commitment_' . $i . '_title_en')->nullable();
                $table->string('commitment_' . $i . '_title_bn')->nullable();
                $table->text('commitment_' . $i . '_description_en')->nullable();
                $table->text('commitment_' . $i . '_description_bn')->nullable();
            }

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mission_and_vision');
    }
};
