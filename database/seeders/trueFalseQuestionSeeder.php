<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class trueFalseQuestionSeeder extends Seeder
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
            'quiz_id' => 3,
            'title' => 'Fedora is a linux distro.',
            'answers' => json_encode([
                0,
                1
            ]),
            'correct_answer' => 1,
            'questiontype_id' => 3

        ]);
        DB::table('questions')->insert([
            'quiz_id' => 3,
            'title' => 'Amazon was created by Elon Musk',
            'answers' => json_encode([
                0,
                1
            ]),
            'correct_answer' => 0,
            'questiontype_id' => 3

        ]);
        DB::table('questions')->insert([
            'quiz_id' => 3,
            'title' => 'AMD is the most profitable tech company of 2020',
            'answers' => json_encode([
                0,
                1
            ]),
            'correct_answer' => 1,
            'questiontype_id' => 3

        ]);
        DB::table('questions')->insert([
            'quiz_id' => 3,
            'title' => 'RAM stands for Random Access Memory',
            'answers' => json_encode([
                0,
                1
            ]),
            'correct_answer' => 1,
            'questiontype_id' => 3

        ]);
        DB::table('questions')->insert([
            'quiz_id' => 3,
            'title' => 'A Gigabyte has 10240 Kilobytes',
            'answers' => json_encode([
                0,
                1
            ]),
            'correct_answer' => 0,
            'questiontype_id' => 3

        ]);
    }
}
