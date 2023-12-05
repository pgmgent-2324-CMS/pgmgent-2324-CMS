<?php

namespace Database\Seeders;

use App\Models\Message;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Empty the messages table
        Message::truncate();
        // Add 100 messages 
        Message::factory(100)->create();
    }
}
