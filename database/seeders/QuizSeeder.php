<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("quizzes")->insert([
            [
                'name'=>'Introduction to Mathematics',
                'class_id'=>1,
                'description'=>'Welcome to Mathematics!! Try out this test to measure your logic and counting skills!!',
                'status'=>1,
                'repeat'=>0,
                'start_date'=> new Carbon('first day of December 2022'),
                'deadline'=> new Carbon('first day of February 2023'),
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ],
            [
                'name'=>'Multiplication and Division',
                'class_id'=>1,
                'description'=>"Let's test out your multiplication and division skills!!",
                'status'=>1,
                'repeat'=>0,
                'start_date'=> new Carbon('first day of March 2023'),
                'deadline'=> new Carbon('first day of March 2024'),
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ],
            [
                'name'=>'Majapahit Quiz',
                'class_id'=>2,
                'description'=>'Test out your memory and understanding of the history of Majapahit Kingdom',
                'status'=>1,
                'repeat'=>0,
                'start_date'=> new Carbon('first day of December 2022'),
                'deadline'=> new Carbon('first day of January 2024'),
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ],
        ]);
    }
}
