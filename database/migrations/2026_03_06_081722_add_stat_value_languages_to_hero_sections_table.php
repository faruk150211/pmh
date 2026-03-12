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
            $table->string('stat_1_en_value')->nullable()->after('stat_1_label_bn');
            $table->string('stat_1_bn_value')->nullable()->after('stat_1_en_value');
            $table->string('stat_2_en_value')->nullable()->after('stat_2_label_bn');
            $table->string('stat_2_bn_value')->nullable()->after('stat_2_en_value');
            $table->string('stat_3_en_value')->nullable()->after('stat_3_label_bn');
            $table->string('stat_3_bn_value')->nullable()->after('stat_3_en_value');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hero_sections', function (Blueprint $table) {
            $table->dropColumn(['stat_1_en_value', 'stat_1_bn_value', 'stat_2_en_value', 'stat_2_bn_value', 'stat_3_en_value', 'stat_3_bn_value']);
        });
    }
};
