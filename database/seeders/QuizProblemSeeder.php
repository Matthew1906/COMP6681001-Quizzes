<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuizProblemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("quiz_problems")->insert([
            // Quiz 1
            [
                'index'=> 1,
                'quiz_id'=>1,
                'problem_id'=>1,
                'problem_type'=>'App\Models\FillProblem',
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ],
            [
                'index'=> 2,
                'quiz_id'=>1,
                'problem_id'=>2,
                'problem_type'=>'App\Models\FillProblem',
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ],
            [
                'index'=> 3,
                'quiz_id'=>1,
                'problem_id'=>1,
                'problem_type'=>'App\Models\MCProblem',
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ],
            [
                'index'=> 4,
                'quiz_id'=>1,
                'problem_id'=>2,
                'problem_type'=>'App\Models\MCProblem',
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ],
            [
                'index'=> 5,
                'quiz_id'=>1,
                'problem_id'=>3,
                'problem_type'=>'App\Models\FillProblem',
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ],
            [
                'index'=> 6,
                'quiz_id'=>1,
                'problem_id'=>4,
                'problem_type'=>'App\Models\FillProblem',
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ],
            [
                'index'=> 7,
                'quiz_id'=>1,
                'problem_id'=>5,
                'problem_type'=>'App\Models\FillProblem',
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ],
            [
                'index'=> 8,
                'quiz_id'=>1,
                'problem_id'=>3,
                'problem_type'=>'App\Models\MCProblem',
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ],
            [
                'index'=> 9,
                'quiz_id'=>1,
                'problem_id'=>4,
                'problem_type'=>'App\Models\MCProblem',
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ],
            // Quiz 2
            [
                'index'=> 1,
                'quiz_id'=>2,
                'problem_id'=>6,
                'problem_type'=>'App\Models\FillProblem',
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ],
            [
                'index'=> 2,
                'quiz_id'=>2,
                'problem_id'=>7,
                'problem_type'=>'App\Models\FillProblem',
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ],
            [
                'index'=> 3,
                'quiz_id'=>2,
                'problem_id'=>6,
                'problem_type'=>'App\Models\MCProblem',
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ],
            [
                'index'=> 4,
                'quiz_id'=>2,
                'problem_id'=>8,
                'problem_type'=>'App\Models\FillProblem',
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ],
            [
                'index'=> 5,
                'quiz_id'=>2,
                'problem_id'=>9,
                'problem_type'=>'App\Models\FillProblem',
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ],
            [
                'index'=> 6,
                'quiz_id'=>2,
                'problem_id'=>5,
                'problem_type'=>'App\Models\MCProblem',
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ],
            [
                'index'=> 7,
                'quiz_id'=>2,
                'problem_id'=>10,
                'problem_type'=>'App\Models\FillProblem',
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ],
            [
                'index'=> 8,
                'quiz_id'=>2,
                'problem_id'=>11,
                'problem_type'=>'App\Models\FillProblem',
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ],
            [
                'index'=> 9,
                'quiz_id'=>2,
                'problem_id'=>4,
                'problem_type'=>'App\Models\MCProblem',
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ],
            [
                'index'=> 10,
                'quiz_id'=>2,
                'problem_id'=>7,
                'problem_type'=>'App\Models\MCProblem',
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ],
            // Majapahit
            [
                'index'=> 1,
                'quiz_id'=>3,
                'problem_id'=>12,
                'problem_type'=>'App\Models\FillProblem',
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ],
            [
                'index'=> 2,
                'quiz_id'=>3,
                'problem_id'=>8,
                'problem_type'=>'App\Models\MCProblem',
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ],
            [
                'index'=> 3,
                'quiz_id'=>3,
                'problem_id'=>9,
                'problem_type'=>'App\Models\MCProblem',
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ],
            [
                'index'=> 4,
                'quiz_id'=>3,
                'problem_id'=>13,
                'problem_type'=>'App\Models\FillProblem',
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ],
            [
                'index'=> 5,
                'quiz_id'=>3,
                'problem_id'=>10,
                'problem_type'=>'App\Models\MCProblem',
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ],
        ]);
    }
}
