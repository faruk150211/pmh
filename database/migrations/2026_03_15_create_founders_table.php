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
        Schema::create('founders', function (Blueprint $table) {
            $table->id();

            // Bilingual title
            $table->string('title_en', 255);
            $table->string('title_bn', 255);

            // Bilingual subtitle
            $table->string('subtitle_en', 255);
            $table->string('subtitle_bn', 255);

            // Bilingual quote
            $table->text('quote_en');
            $table->text('quote_bn');

            // Bilingual vision section
            $table->string('vision_heading_en', 255);
            $table->string('vision_heading_bn', 255);
            $table->text('vision_description_en');
            $table->text('vision_description_bn');

            // Bilingual highlights (3 items)
            $table->string('highlight_1_title_en', 255);
            $table->string('highlight_1_title_bn', 255);
            $table->text('highlight_1_description_en');
            $table->text('highlight_1_description_bn');

            $table->string('highlight_2_title_en', 255);
            $table->string('highlight_2_title_bn', 255);
            $table->text('highlight_2_description_en');
            $table->text('highlight_2_description_bn');

            $table->string('highlight_3_title_en', 255);
            $table->string('highlight_3_title_bn', 255);
            $table->text('highlight_3_description_en');
            $table->text('highlight_3_description_bn');

            // Bilingual badge label
            $table->string('badge_label_en', 255);
            $table->string('badge_label_bn', 255);

            // Founder picture
            $table->string('picture')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('founders');
    }
};
