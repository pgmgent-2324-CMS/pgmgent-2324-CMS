<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //run message seeder
        $this->call(MessageSeeder::class);

        //remove all data from table
        //Message::truncate();
        //add 500 new records
        //Message::factory()
        //    ->count(500)
        //    ->create();
    }
}
