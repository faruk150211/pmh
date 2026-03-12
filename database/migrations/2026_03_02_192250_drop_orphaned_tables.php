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
        // Disable foreign key checks
        Schema::disableForeignKeyConstraints();

        // Drop orphaned tables
        Schema::dropIfExists('role_users');
        Schema::dropIfExists('seats');
        Schema::dropIfExists('disciplines');
        Schema::dropIfExists('schools');
        Schema::dropIfExists('units');
        Schema::dropIfExists('roles');

        // Re-enable foreign key checks
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // This migration is irreversible
    }
};
