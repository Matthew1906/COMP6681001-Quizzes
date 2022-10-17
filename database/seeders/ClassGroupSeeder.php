<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ClassGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("class_groups")->insert([
            [
                'name'=>'Class A',
                'description'=>'Class A, Led by Mr. Charles',
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString(),
            ],
            [
                'name'=>'Class B',
                'description'=>'Class B, Led by Lord Djoni',
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString(),
            ],
        ]);
    }
}
