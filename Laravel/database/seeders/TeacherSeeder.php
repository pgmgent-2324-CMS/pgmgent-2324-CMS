<?php

namespace Database\Seeders;

use App\Models\Course;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Teacher;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //empty the pivot table and course table
        Teacher::truncate();
     
        //create courses
        Teacher::factory()->count(100)->create();

    }
}
