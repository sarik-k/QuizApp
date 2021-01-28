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
        DB::table('quiztypes')->insert([
            'name' => 'Multiple Choice',
            'description' => 'One correct answer'
        ]);
        DB::table('quiztypes')->insert([
            'name' => 'Multiple Response',
            'description' => 'More than one correct answers'
        ]);
        DB::table('quiztypes')->insert([
            'name' => 'True or False',
            'description' => 'One correct answer'
        ]);
        DB::table('quiztypes')->insert([
            'name' => 'Short Text',
            'description' => 'Requires exact match'
        ]);
    }
}
