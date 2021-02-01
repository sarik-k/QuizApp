<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
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
            'quiz_id' => '1',
            'title' => 'What is Laravel?',
            'answers' => '[
                "A Programming Language", 
                "A PHP Framework", 
                "A JavaScript Framework", 
                "A CSS Framework"
                ]',
            'correct_answer' => '1',
            'questiontype_id' => '1'
        ]);

        DB::table('questions')->insert([
            'quiz_id' => '1', 'title' => 'Which of these are made specifically for Laravel', 'answers' => '["Inertia", "Alpine", "Livewire", "Voyager"]', 'correct_answer' => '["2","3"]', 'questiontype_id' => '2'
        ]);

        DB::table('questions')->insert([
            'quiz_id' => '1', 'title' => 'You can use the command \'php artisan create:controller\' to create a controller.', 'answers' => '[0, 1]', 'correct_answer' => '0', 'questiontype_id' => '3'
        ]);

        DB::table('questions')->insert([
            'quiz_id' => '1', 'title' => 'Who created Laravel?', 'answers' => '["Taylor Otwell", "Otwell, Taylor"]', 'correct_answer' => '["taylorotwell","otwell,taylor"]', 'questiontype_id' => '4'
        ]);

        DB::table('questions')->insert([
            'quiz_id' => '1', 'title' => 'Which templating engine does Laravel use?', 'answers' => '["Antler", "Blade", "Twig"]', 'correct_answer' => '1', 'questiontype_id' => '1'
        ]);

        DB::table('questions')->insert([
            'quiz_id' => '1', 'title' => 'Which of these files are used for Routing in Laravel by default?', 'answers' => '["api.php", "home.php", "routes.php", "web.php"]', 'correct_answer' => '["0","3"]', 'questiontype_id' => '2'
        ]);

        DB::table('questions')->insert([
            'quiz_id' => '1', 'title' => 'To insert dummy/default data into the database, we can use Seeders.', 'answers' => '[0, 1]', 'correct_answer' => '1', 'questiontype_id' => '3'
        ]);

        DB::table('questions')->insert([
            'quiz_id' => '1', 'title' => 'What is the blade directive used to check if the user has a permission?', 'answers' => '["can", "@can", "@can()", "@can(\'\')"]', 'correct_answer' => '["can","@can","@can()","@can(\'\')"]', 'questiontype_id' => '4'
        ]);
    }
}
