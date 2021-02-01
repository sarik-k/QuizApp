<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MultipleChoiceQuestionSeeder extends Seeder
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
            'quiz_id' => 1,
            'title' => 'What is Laravel?',
            'answers' => json_encode([
                "A Programming Language",
                "A PHP Framework",
                "A JavaScript Framework",
                "A CSS Framework"
            ]),
            'correct_answer' => 1,
            'questiontype_id' => 1
        ]);

        DB::table('questions')->insert([
            'quiz_id' => 1,
            'title' => 'Which one of these is the correct blade directive symbol?',
            'answers' => json_encode([
                "@",
                "#",
                "$",
                "&"
            ]),
            'correct_answer' => 0,
            'questiontype_id' => 1

        ]);

        DB::table('questions')->insert([
            'quiz_id' => 1,
            'title' => 'Which templating engine does Laravel use?',
            'answers' => json_encode([
                "Twig",
                "Antler",
                "Blade"
            ]),
            'correct_answer' => 2,
            'questiontype_id' => 1

        ]);

        DB::table('questions')->insert([
            'quiz_id' => 1,
            'title' => 'Who is the creator of Laravel?',
            'answers' => json_encode([
                "Jeffrey Way",
                "Evan You",
                "Taylor Otwell",
                "Jordan Walke"
            ]),
            'correct_answer' => 2,
            'questiontype_id' => 1

        ]);

        DB::table('questions')->insert([
            'quiz_id' => 1,
            'title' => 'When will Laravel 9 be released?',
            'answers' => json_encode([
                "March 2021",
                "June 2021",
                "September 2021",
                "December 2021"
            ]),
            'correct_answer' => 2,
            'questiontype_id' => 1

        ]);

        DB::table('questions')->insert([
            'quiz_id' => 1,
            'title' => 'In which route file is the home route located by default?',
            'answers' => json_encode([
                "web.php",
                "routes.php",
                "home.php",
                "api.php"
            ]),
            'correct_answer' => 0,
            'questiontype_id' => 1

        ]);

        DB::table('questions')->insert([
            'quiz_id' => 1,
            'title' => 'What is the artisan command to create a controller?',
            'answers' => json_encode([
                "php artisan controller:create",
                "php artisan create:controller",
                "php artisan build:controller",
                "php artisan make:controller"
            ]),
            'correct_answer' => 3,
            'questiontype_id' => 1

        ]);

        DB::table('questions')->insert([
            'quiz_id' => 1,
            'title' => 'To fill a database with default/dummy data, we use',
            'answers' => json_encode([
                "Fillers",
                "Seeders",
                "Defaults",
                "None of the Above"
            ]),
            'correct_answer' => 1,
            'questiontype_id' => 1

        ]);
    }
}
