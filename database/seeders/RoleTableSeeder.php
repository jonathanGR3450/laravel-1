<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();

        Role::create([
            "name" => "mod",
            "display_name" => "moderator",
            "description" => 'moderador del sitio',
        ]);
        Role::create([
            "name" => "admin",
            "display_name" => "administrator",
            "description" => 'administrador del sitio',
        ]);
    }
}
