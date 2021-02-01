<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ShortTextQuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('questions')->insert([
            'quiz_id' => 4,
            'title' => 'What does H stand for in H2O?',
            'answers' => json_encode(
                ["Hydrozen"]
            ),
            'correct_answer' => json_encode(
                ["hydrozen"]
            ),
            'questiontype_id' => 4

        ]);
        DB::table('questions')->insert([
            'quiz_id' => 4,
            'title' => 'How many moons does Mars have?',
            'answers' => json_encode(
                ["2", "two"]
            ),
            'correct_answer' => json_encode(
                ["2", "two"]
            ),
            'questiontype_id' => 4

        ]);
        DB::table('questions')->insert([
            'quiz_id' => 4,
            'title' => 'What divides the Earth into Northern and Southern Hemisphere?',
            'answers' => json_encode(
                ["equator"]
            ),
            'correct_answer' => json_encode(
                ["equator"]
            ),
            'questiontype_id' => 4

        ]);
        DB::table('questions')->insert([
            'quiz_id' => 4,
            'title' => 'Solve the following: 2+2-2/2*2',
            'answers' => json_encode(
                ["2", "Two"]
            ),
            'correct_answer' => json_encode(
                ["2", "two"]
            ),
            'questiontype_id' => 4

        ]);
        DB::table('questions')->insert([
            'quiz_id' => 4,
            'title' => 'What is the capital of UK?',
            'answers' => json_encode(
                ["London"]
            ),
            'correct_answer' => json_encode(
                ["london"]
            ),
            'questiontype_id' => 4

        ]);
    }
}
