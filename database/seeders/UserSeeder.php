<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'firstName' => 'Paulo',
            'lastName' => 'Cesar',
            'email' => 'paulocesar81446@gmail.com',
            'password' => bcrypt('25A32#66c'),

        ]);
    }
}
