<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class add_admin_user extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => Hash::make('12345'),
        'login' => 'admin',
        'superAdmin' => true,
        ]);
    }
}
