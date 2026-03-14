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
        Schema::table('services', function (Blueprint $table) {
            $table->text('short_description_en')->nullable()->after('title_bn');
            $table->text('short_description_bn')->nullable()->after('short_description_en');
            $table->boolean('show_on_home')->default(false)->after('banner');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['short_description_en', 'short_description_bn', 'show_on_home']);
        });
    }
};
