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
        Schema::create('get_in_touch', function (Blueprint $table) {
            $table->id();

            // Bilingual badge
            $table->string('badge_en', 255)->nullable();
            $table->string('badge_bn', 255)->nullable();

            // Bilingual heading
            $table->string('heading_en', 255)->nullable();
            $table->string('heading_bn', 255)->nullable();

            // Bilingual description
            $table->text('description_en')->nullable();
            $table->text('description_bn')->nullable();

            // Contact details 1 - Phone
            $table->string('contact_1_title_en', 255)->nullable();
            $table->string('contact_1_title_bn', 255)->nullable();
            $table->string('contact_1_value_en', 255)->nullable();
            $table->string('contact_1_value_bn', 255)->nullable();
            $table->text('contact_1_description_en')->nullable();
            $table->text('contact_1_description_bn')->nullable();

            // Contact details 2 - Email
            $table->string('contact_2_title_en', 255)->nullable();
            $table->string('contact_2_title_bn', 255)->nullable();
            $table->string('contact_2_value_en', 255)->nullable();
            $table->string('contact_2_value_bn', 255)->nullable();
            $table->text('contact_2_description_en')->nullable();
            $table->text('contact_2_description_bn')->nullable();

            // Contact details 3 - Hours
            $table->string('contact_3_title_en', 255)->nullable();
            $table->string('contact_3_title_bn', 255)->nullable();
            $table->text('contact_3_value_en')->nullable();
            $table->text('contact_3_value_bn')->nullable();
            $table->text('contact_3_description_en')->nullable();
            $table->text('contact_3_description_bn')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('get_in_touch');
    }
};
