<?php

namespace Database\Seeders;

use App\Models\Note;
use Illuminate\Database\Seeder;

class NoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Note::truncate();

        Note::create([
            "body" => "nota usuario dos",
            'notable_id' => '2',
            'notable_type' => 'App\Models\User',
        ]);

        Note::create([
            "body" => "nota usuario tres",
            'notable_id' => '3',
            'notable_type' => 'App\Models\User',
        ]);

        Note::create([
            "body" => "nota mensaje ocho",
            'notable_id' => '8',
            'notable_type' => 'App\Models\Message',
        ]);

        Note::create([
            "body" => "nota mensaje tres",
            'notable_id' => '3',
            'notable_type' => 'App\Models\Message',
        ]);
    }
}
