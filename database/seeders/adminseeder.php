<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class adminseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('12345678'),
            'email_verified_at' => now(),
            'created_at' => now(),
        ]);
    }
}
