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
        $faker = \Faker\Factory::create();

        for($i = 0; $i < 10000000; $i++){
            $student = new \App\Models\StudentsModel();
            $student->name = $faker->firstName();
            $student->surname = $faker->lastName();
            $student->age = $faker->numberBetween(18, 30);
            $student->address = $faker->address();

            $student->save();
        }
    }
}
