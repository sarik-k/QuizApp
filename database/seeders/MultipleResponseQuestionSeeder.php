<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MultipleResponseQuestionSeeder extends Seeder
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
            'quiz_id' => 2,
            'title' => 'Select all fruits',
            'answers' => json_encode([
                "Apple",
                "Mango",
                "Orange",
                "Cabbage"
            ]),
            'correct_answer' => json_encode([
                "0",
                "1",
                "2"
            ])
        ]);

        DB::table('questions')->insert([
            'quiz_id' => 2,
            'title' => 'Select all vehicles',
            'answers' => json_encode([
                "Laptop",
                "Car",
                "Shoes",
                "Bike"
            ]),
            'correct_answer' => json_encode([
                "1",
                "3",
            ])
        ]);

        DB::table('questions')->insert([
            'quiz_id' => 2,
            'title' => 'Select all countries',
            'answers' => json_encode([
                "Nepal",
                "Kathmandu",
                "Sydney",
                "Mars"
            ]),
            'correct_answer' => json_encode([
                "0"
            ])
        ]);

        DB::table('questions')->insert([
            'quiz_id' => 2,
            'title' => 'Select all musical instruments',
            'answers' => json_encode([
                "Earphones",
                "Speaker",
                "Guitar",
                "Banjo"
            ]),
            'correct_answer' => json_encode([
                "2",
                "3",
            ])
        ]);

        DB::table('questions')->insert([
            'quiz_id' => 2,
            'title' => 'Select all animals',
            'answers' => json_encode([
                "Cat",
                "Dog",
                "Cactus",
                "Horse"
            ]),
            'correct_answer' => json_encode([
                "0",
                "1",
                "3"
            ])
        ]);

        

        
    }
}
