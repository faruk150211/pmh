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
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();

            // Page Title Section
            $table->string('heading_en')->nullable();
            $table->string('heading_bn')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_bn')->nullable();

            // Main Content Section
            $table->string('main_title_en')->nullable();
            $table->string('main_title_bn')->nullable();
            $table->text('main_lead_en')->nullable();
            $table->text('main_lead_bn')->nullable();
            $table->text('main_description_en')->nullable();
            $table->text('main_description_bn')->nullable();

            // Images
            $table->string('main_image')->nullable();
            $table->string('floating_image')->nullable();

            // Statistics
            $table->string('stat_1_value')->nullable();
            $table->string('stat_1_label_en')->nullable();
            $table->string('stat_1_label_bn')->nullable();
            $table->string('stat_2_value')->nullable();
            $table->string('stat_2_label_en')->nullable();
            $table->string('stat_2_label_bn')->nullable();
            $table->string('stat_3_value')->nullable();
            $table->string('stat_3_label_en')->nullable();
            $table->string('stat_3_label_bn')->nullable();

            // Values Section
            $table->string('values_heading_en')->nullable();
            $table->string('values_heading_bn')->nullable();
            $table->text('values_description_en')->nullable();
            $table->text('values_description_bn')->nullable();

            // Values Items
            $table->string('value_1_title_en')->nullable();
            $table->string('value_1_title_bn')->nullable();
            $table->text('value_1_description_en')->nullable();
            $table->text('value_1_description_bn')->nullable();

            $table->string('value_2_title_en')->nullable();
            $table->string('value_2_title_bn')->nullable();
            $table->text('value_2_description_en')->nullable();
            $table->text('value_2_description_bn')->nullable();

            $table->string('value_3_title_en')->nullable();
            $table->string('value_3_title_bn')->nullable();
            $table->text('value_3_description_en')->nullable();
            $table->text('value_3_description_bn')->nullable();

            $table->string('value_4_title_en')->nullable();
            $table->string('value_4_title_bn')->nullable();
            $table->text('value_4_description_en')->nullable();
            $table->text('value_4_description_bn')->nullable();

            // Certifications Section
            $table->string('certifications_heading_en')->nullable();
            $table->string('certifications_heading_bn')->nullable();
            $table->text('certifications_description_en')->nullable();
            $table->text('certifications_description_bn')->nullable();

            // Certification Images
            $table->string('cert_1_image')->nullable();
            $table->string('cert_2_image')->nullable();
            $table->string('cert_3_image')->nullable();
            $table->string('cert_4_image')->nullable();
            $table->string('cert_5_image')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us');
    }
};
