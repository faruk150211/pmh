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
        Schema::table('hero_sections', function (Blueprint $table) {
            $table->string('badge_1_en')->nullable()->after('image');
            $table->string('badge_1_bn')->nullable()->after('badge_1_en');
            $table->string('badge_2_en')->nullable()->after('badge_1_bn');
            $table->string('badge_2_bn')->nullable()->after('badge_2_en');
            $table->string('badge_3_en')->nullable()->after('badge_2_bn');
            $table->string('badge_3_bn')->nullable()->after('badge_3_en');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hero_sections', function (Blueprint $table) {
            $table->dropColumn(['badge_1_en', 'badge_1_bn', 'badge_2_en', 'badge_2_bn', 'badge_3_en', 'badge_3_bn']);
        });
    }
};
