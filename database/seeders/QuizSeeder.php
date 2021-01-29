<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('quizzes')->insert([
            'name' => 'Do you know Laravel?',
            'description' => 'A simple quiz to test your Laravel skills.',
            'user_id' => 2,
            'quiztype_id' => 1
        ]);
    }
}
