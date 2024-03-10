<?php

namespace Database\Seeders;

use App\Models\Admin;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        Admin::create([
            "name" => "Dawud",
            "username" => "dawud",
            "email" => "dawud@gmail.com",
            "password" => bcrypt(value: "dawud12345"),
        ]);
    }
}
