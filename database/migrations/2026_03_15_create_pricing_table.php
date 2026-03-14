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
        Schema::create('pricing', function (Blueprint $table) {
            $table->id();

            // Title & Description
            $table->string('title_en')->nullable();
            $table->string('title_bn')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_bn')->nullable();

            // Price Information
            $table->decimal('price', 10, 2)->default(5000);
            $table->string('price_label_en')->nullable();
            $table->string('price_label_bn')->nullable();
            $table->string('price_subtitle_en')->nullable();
            $table->string('price_subtitle_bn')->nullable();
            $table->string('currency')->default('৳');

            // Features (5 features)
            $table->string('feature_1_en')->nullable();
            $table->string('feature_1_bn')->nullable();
            $table->string('feature_2_en')->nullable();
            $table->string('feature_2_bn')->nullable();
            $table->string('feature_3_en')->nullable();
            $table->string('feature_3_bn')->nullable();
            $table->string('feature_4_en')->nullable();
            $table->string('feature_4_bn')->nullable();
            $table->string('feature_5_en')->nullable();
            $table->string('feature_5_bn')->nullable();

            // Features title/label
            $table->string('features_title_en')->nullable();
            $table->string('features_title_bn')->nullable();

            // Pricing note at bottom
            $table->text('note_en')->nullable();
            $table->text('note_bn')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pricing');
    }
};
