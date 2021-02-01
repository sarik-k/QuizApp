<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            UserSeeder::class,
            RolesAndPermissionsSeeder::class,
            QuizSeeder::class,
            QuestionSeeder::class,
            QuestionTypesSeeder::class,
            ResultSeeder::class
        ]);
    }
}
