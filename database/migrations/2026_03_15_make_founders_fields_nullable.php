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
        Schema::table('founders', function (Blueprint $table) {
            // Make all fields nullable
            $table->string('title_en', 255)->nullable()->change();
            $table->string('title_bn', 255)->nullable()->change();
            $table->string('subtitle_en', 255)->nullable()->change();
            $table->string('subtitle_bn', 255)->nullable()->change();
            $table->text('quote_en')->nullable()->change();
            $table->text('quote_bn')->nullable()->change();
            $table->string('vision_heading_en', 255)->nullable()->change();
            $table->string('vision_heading_bn', 255)->nullable()->change();
            $table->text('vision_description_en')->nullable()->change();
            $table->text('vision_description_bn')->nullable()->change();
            $table->string('highlight_1_title_en', 255)->nullable()->change();
            $table->string('highlight_1_title_bn', 255)->nullable()->change();
            $table->text('highlight_1_description_en')->nullable()->change();
            $table->text('highlight_1_description_bn')->nullable()->change();
            $table->string('highlight_2_title_en', 255)->nullable()->change();
            $table->string('highlight_2_title_bn', 255)->nullable()->change();
            $table->text('highlight_2_description_en')->nullable()->change();
            $table->text('highlight_2_description_bn')->nullable()->change();
            $table->string('highlight_3_title_en', 255)->nullable()->change();
            $table->string('highlight_3_title_bn', 255)->nullable()->change();
            $table->text('highlight_3_description_en')->nullable()->change();
            $table->text('highlight_3_description_bn')->nullable()->change();
            $table->string('badge_label_en', 255)->nullable()->change();
            $table->string('badge_label_bn', 255)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('founders', function (Blueprint $table) {
            $table->string('title_en', 255)->nullable(false)->change();
            $table->string('title_bn', 255)->nullable(false)->change();
            $table->string('subtitle_en', 255)->nullable(false)->change();
            $table->string('subtitle_bn', 255)->nullable(false)->change();
            $table->text('quote_en')->nullable(false)->change();
            $table->text('quote_bn')->nullable(false)->change();
            $table->string('vision_heading_en', 255)->nullable(false)->change();
            $table->string('vision_heading_bn', 255)->nullable(false)->change();
            $table->text('vision_description_en')->nullable(false)->change();
            $table->text('vision_description_bn')->nullable(false)->change();
            $table->string('highlight_1_title_en', 255)->nullable(false)->change();
            $table->string('highlight_1_title_bn', 255)->nullable(false)->change();
            $table->text('highlight_1_description_en')->nullable(false)->change();
            $table->text('highlight_1_description_bn')->nullable(false)->change();
            $table->string('highlight_2_title_en', 255)->nullable(false)->change();
            $table->string('highlight_2_title_bn', 255)->nullable(false)->change();
            $table->text('highlight_2_description_en')->nullable(false)->change();
            $table->text('highlight_2_description_bn')->nullable(false)->change();
            $table->string('highlight_3_title_en', 255)->nullable(false)->change();
            $table->string('highlight_3_title_bn', 255)->nullable(false)->change();
            $table->text('highlight_3_description_en')->nullable(false)->change();
            $table->text('highlight_3_description_bn')->nullable(false)->change();
            $table->string('badge_label_en', 255)->nullable(false)->change();
            $table->string('badge_label_bn', 255)->nullable(false)->change();
        });
    }
};
