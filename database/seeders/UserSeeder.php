<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([
            [
                'role_id'=>1,
                'full_name'=>'Charles Wilbert',
                'email'=>'charlesw@qmail.com',
                'password'=>bcrypt('charleswilbert'),
                'dob'=>fake()->dateTimeBetween("-65 years", "-20 years"),
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ],
            [
                'role_id'=>1,
                'full_name'=>'Bryan Djoni',
                'email'=>'bryand@qmail.com',
                'password'=>bcrypt('bryandjoni'),
                'dob'=>fake()->dateTimeBetween("-65 years", "-20 years"),
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ],
            [
                'role_id'=>2,
                'full_name'=>'Matthew Adrianus Mulyono',
                'email'=>'matthewam@qmail.com',
                'password'=>bcrypt('matthewadrianusmulyono'),
                'dob'=>fake()->dateTimeBetween("-20 years", "-10 years"),
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ],
            [
                'role_id'=>2,
                'full_name'=>'Sathya Narendra Atmajati Satoto',
                'email'=>'sathyanas@qmail.com',
                'password'=>bcrypt('sathyanarendraatmajatisatoto'),
                'dob'=>fake()->dateTimeBetween("-20 years", "-10 years"),
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ],
            [
                'role_id'=>2,
                'full_name'=>'Joko Oey',
                'email'=>'jokoo@qmail.com',
                'password'=>bcrypt('jokooey'),
                'dob'=>fake()->dateTimeBetween("-20 years", "-10 years"),
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ],
        ]);
    }
}
