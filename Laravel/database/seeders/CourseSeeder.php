<?php

namespace Database\Seeders;

use App\Models\Course;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Teacher;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //empty the pivot table and course table
        DB::table('course_teacher')->truncate();
        Course::truncate();
     
        //create courses
        Course::factory()->count(50)->create();

        //attach 1-3 random teachers to each course
        foreach (Course::all() as $course) {
            $teachers = Teacher::inRandomOrder()->take(rand(1, 3))->pluck('id');
            foreach ($teachers as $teacher) {
                DB::table('course_teacher')->insert([
                    'course_id' => $course->id,
                    'teacher_id' => $teacher,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }


    }
}
