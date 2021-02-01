<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class QuestionTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('questiontypes')->insert([
            'name' => 'Multiple Choice',
            'description' => 'One correct answer'
        ]);
        DB::table('questiontypes')->insert([
            'name' => 'Multiple Response',
            'description' => 'More than one correct answers'
        ]);
        DB::table('questiontypes')->insert([
            'name' => 'True or False',
            'description' => 'One correct answer'
        ]);
        DB::table('questiontypes')->insert([
            'name' => 'Short Text',
            'description' => 'Requires exact match'
        ]);
    }
}
