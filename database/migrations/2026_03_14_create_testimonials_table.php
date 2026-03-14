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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();

            // Bilingual title
            $table->string('title_en')->nullable();
            $table->string('title_bn')->nullable();

            // Bilingual testimonial content
            $table->text('content_en');
            $table->text('content_bn');

            // Bilingual author name
            $table->string('author_en')->nullable();
            $table->string('author_bn')->nullable();

            // Show on home
            $table->boolean('show_on_home')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
