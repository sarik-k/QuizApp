<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('results')->insert([
            'quiz_id' => '1','email' => 'sarik.karmacharya@gmail.com','name' => 'Sarik Karmacharya','answers' => '[{"score": 1, "question": "What is Laravel?", "is_correct": true, "all_answers": ["A Programming Language", "A PHP Framework", "A JavaScript Framework", "A CSS Framework"], "given_answer": "1", "question_type": 1, "correct_answer": "1"}, {"score": 1, "question": "Which of these are made specifically for Laravel", "all_answers": ["Inertia", "Alpine", "Livewire", "Voyager"], "given_answers": ["2"], "question_type": 2, "correct_answers": ["2", "3"], "no_of_wrong_answers_given": 0, "no_of_correct_answers_given": 1}, {"score": 1, "question": "You can use the command \'php artisan create:controller\' to create a controller.", "is_correct": true, "all_answers": [0, 1], "given_answer": "0", "question_type": 3, "correct_answer": "0"}, {"score": 1, "question": "Who created Laravel?", "is_correct": true, "all_answers": ["Taylor Otwell", "Otwell, Taylor"], "given_answer": "Taylor Otwell", "question_type": 4, "correct_answers": ["taylorotwell", "otwell,taylor"]}, {"score": 1, "question": "Which templating engine does Laravel use?", "is_correct": true, "all_answers": ["Antler", "Blade", "Twig"], "given_answer": "1", "question_type": 1, "correct_answer": "1"}, {"score": 1, "question": "Which of these files are used for Routing in Laravel by default?", "all_answers": ["api.php", "home.php", "routes.php", "web.php"], "given_answers": ["0", "2", "3"], "question_type": 2, "correct_answers": ["0", "3"], "no_of_wrong_answers_given": 1, "no_of_correct_answers_given": 2}, {"score": 1, "question": "To insert dummy/default data into the database, we can use Seeders.", "is_correct": true, "all_answers": [0, 1], "given_answer": "1", "question_type": 3, "correct_answer": "1"}, {"score": 1, "question": "What is the blade directive used to check if the user has a permission?", "is_correct": true, "all_answers": ["can", "@can", "@can()", "@can(\'\')"], "given_answer": "@can", "question_type": 4, "correct_answers": ["can", "@can", "@can()", "@can(\'\')"]}]','total_questions' => '8','correct_answers' => '4','score' => '80'
        ]);

    }
}
