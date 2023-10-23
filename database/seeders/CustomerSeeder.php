<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'Admin',
            'email' => 'Admin@gmail.com',
            'password' => Hash::make('123456789'),
            'user_type' => 'Admin',
        ]);
        User::create([
            'name' => 'Freelancer',
            'email' => 'Freelancer1@gmail.com',
            'password' => Hash::make('123456789'),
            'user_type' => 'embroidery_freelancer',
            'category_id' => 1
        ]);
        User::create([
            'name' => 'testuser',
            'email' => 'testuser@gmail.com',
            'password' => Hash::make('123456789'),
            'user_type' => 'customer',
        ]);
        User::create([
            'name' => 'Freelancer',
            'email' => 'Freelancer2@gmail.com',
            'password' => Hash::make('123456789'),
            'user_type' => 'vector_freelancer',
            'category_id' => 2
        ]);
        User::create([
            'name' => 'manpreet',
            'email' => 'manpreet@gmail.com',
            'password' => Hash::make('123456789'),
            'user_type' => 'customer',
        ]);
    }
}