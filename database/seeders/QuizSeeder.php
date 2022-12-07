<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                'description'=>'Welcome to Mathematics!! Try out this test to measure your logic and counting skills!!',
                'status'=>1,
                'repeat'=>0,
                'deadline'=> new Carbon('first day of January 2024'),
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ],
            [
                'name'=>'Multiplication and Division',
                'description'=>"Let's test out your multiplication and division skills!!",
                'status'=>1,
                'repeat'=>0,
                'deadline'=> new Carbon('first day of March 2024'),
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ],
            [
                'name'=>'Majapahit Quiz',
                'description'=>'Test out your memory and understanding of the history of Majapahit Kingdom',
                'status'=>1,
                'repeat'=>0,
                'deadline'=> new Carbon('first day of January 2024'),
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ],
        ]);
    }
}