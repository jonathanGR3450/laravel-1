<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        User::create([
            "name" => "jonathan",
            "last_name" => "garzon",
            "email" => "jonatangarzon95@gmail.com",
            "password" => bcrypt('12345678'),
        ]);

        User::create([
            "name" => "andres",
            "last_name" => "garzon",
            "email" => "cemunidosprueba@gmail.com",
            "password" => bcrypt('12345678'),
        ]);
        User::create([
            "name" => "jaime",
            "last_name" => "garzon",
            "email" => "jonathan.garzon.ruiz@unillanos.edu.co",
            "password" => bcrypt('12345678'),
        ]);
    }
}
