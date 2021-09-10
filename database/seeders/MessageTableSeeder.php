<?php

namespace Database\Seeders;

use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MessageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Message::truncate();

        for ($i=0; $i < 30; $i++) {
            Message::create([
                'name' => 'Jonathan' . $i,
                'last_name' => 'Garzon ' . $i,
                'email' => "jonatangarzon$i@gmail.com",
                'subject' => 'asunto ' . $i,
                'content' => 'este es el contenido de un mensaje de prueba ' . $i,
                'created_at' => Carbon::now()->subDays(100)->addDays($i),
            ]);
        }

    }
}
