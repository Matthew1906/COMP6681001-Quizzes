<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MCSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("m_c_problems")->insert([
            [
                'question'=>'2 + 2 = ?',
                'answer'=>'2',
                'choice1'=>'1',
                'choice2'=>'4',
                'choice3'=>'5',
                'choice4'=>'10',
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ],
            [
                'question'=>'5 + 4 = ?',
                'answer'=>'3',
                'choice1'=>'19',
                'choice2'=>'8',
                'choice3'=>'9',
                'choice4'=>'12',
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ],
            [
                'question'=>'12 + 2 = ?',
                'answer'=>'1',
                'choice1'=>'14',
                'choice2'=>'40',
                'choice3'=>'32',
                'choice4'=>'92',
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ],
            // quiz 1 = 3
            [
                'question'=>'2 x 2 = ?',
                'answer'=>'1',
                'choice1'=>'4',
                'choice2'=>'3',
                'choice3'=>'2',
                'choice4'=>'12',
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ],
            [
                'question'=>'5 x 4 = ?',
                'answer'=>'4',
                'choice1'=>'45',
                'choice2'=>'32',
                'choice3'=>'54',
                'choice4'=>'20',
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ],
            [
                'question'=>'12 ÷ 2 = ?',
                'answer'=>'3',
                'choice1'=>'2',
                'choice2'=>'4',
                'choice3'=>'6',
                'choice4'=>'24',
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ],
            [
                'question'=>'892 ÷ 2 = ?',
                'answer'=>'1',
                'choice1'=>'446',
                'choice2'=>'464',
                'choice3'=>'123',
                'choice4'=>'324',
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ],
            // quiz 2 -> 7
            [
                'question'=>'The rebellion of Kuti happens during the rule of ....',
                'answer'=>'1',
                'choice1'=>'Jayanegara',
                'choice2'=>'Joko Widodo',
                'choice3'=>'Susilo Bambang Yudhoyono',
                'choice4'=>'Hayam Wuruk',
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ],
            [
                'question'=>'The rebellion of Kuti is vanquished by ....',
                'answer'=>'3',
                'choice1'=>'Sri Asih',
                'choice2'=>'Black Panther',
                'choice3'=>'Gajah Mada',
                'choice4'=>'Uzumaki Naruto',
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ],
            [
                'question'=>'Raden Wijaya single-handedly defeated the mongolian army sent by .....',
                'answer'=>'1',
                'choice1'=>'Kubilai Khan',
                'choice2'=>'Chakra Khan',
                'choice3'=>'Genghis Khan',
                'choice4'=>'Ogedei Khan',
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ],
        ]);
    }
}
