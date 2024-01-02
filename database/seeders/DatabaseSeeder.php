<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Admin::create([
            'username' => 'Admin Alvin',
            'email' => 'admin@gmail.com',
            'no_hp' => '081386936256',
            'password' => bcrypt('admin123') 
        ]);

        User::create([
            'name' => 'alping',
            'email' => 'alping@gmail.com',
            'password' => bcrypt('password')
        ]);

    }
}
