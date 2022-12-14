<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserRoleSeeder::class,
            UserSeeder::class,
            ClassGroupSeeder::class,
            UserClassSeeder::class,
            QuizSeeder::class,
            MCSeeder::class,
            FillSeeder::class,
            QuizProblemSeeder::class,
        ]);
    }
}
