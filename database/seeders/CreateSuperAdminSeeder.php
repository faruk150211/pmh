<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateSuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if admin already exists
        if (User::where('email', 'admin@gmail.com')->exists()) {
            $this->command->info('Super admin already exists!');
            return;
        }

        // Create super admin user
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password123'),
            'email_verified_at' => now(),
            'is_admin' => true,
        ]);

        $this->command->info('Super admin created successfully!');
        $this->command->info('Email: admin@gmail.com');
        $this->command->info('Password: password123');
    }
}
