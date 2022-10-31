<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'user_type' => 'Administrator',
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'support@power365es.com',
            'email_verified_at' => now(),
            'password' => bcrypt('Password1'),
            'phone_number' => '08161215848',
            'i_agree' => 'Yes'
        ]);
    }
}