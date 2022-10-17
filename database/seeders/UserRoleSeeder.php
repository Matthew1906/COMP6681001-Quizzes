<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("user_roles")->insert([
            [
                'name'=>'teacher',
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ],
            [
                'name'=>'student',
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ],
        ]);
    }
}
