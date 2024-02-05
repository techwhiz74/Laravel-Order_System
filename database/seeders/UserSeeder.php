<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456789'),
            'user_type' => 'admin',
        ]);
        User::create([
            'name' => 'Embroidery Freelancer',
            'email' => 'embroideryfreelancer@gmail.com',
            'password' => Hash::make('123456789'),
            'user_type' => 'embroidery_freelancer',
            'category_id' => 1
        ]);
        User::create([
            'name' => 'Vector Freelancer',
            'email' => 'vectorfreelancer@gmail.com',
            'password' => Hash::make('123456789'),
            'user_type' => 'vector_freelancer',
            'category_id' => 2
        ]);
    }
}