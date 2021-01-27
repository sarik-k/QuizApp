<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;


use Illuminate\Database\Seeder;

class QuiztypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('quiztype')->insert([
            'name' => 'Multiple Choice',
            'description' => 'One correct answer'
        ]);
        DB::table('quiztype')->insert([
            'name' => 'Multiple Response',
            'description' => 'More than one correct answers'
        ]);
        DB::table('quiztype')->insert([
            'name' => 'True or False',
            'description' => 'One correct answer'
        ]);
        DB::table('quiztype')->insert([
            'name' => 'Short Text',
            'description' => 'Requires exact match'
        ]);
    }
}
