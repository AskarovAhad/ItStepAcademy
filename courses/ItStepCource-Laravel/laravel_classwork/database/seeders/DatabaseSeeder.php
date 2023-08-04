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
        // User::factory(10)->create();

        // use the factory to create a Faker\Generator instance
        $faker = \Faker\Factory::create();

        // Заполнения таблицы Студентов спомощью Faker\Generator
        for ($i = 0; $i < 15; $i++) {
            $student = new \App\Models\StudentsModel();
            $student->name = $faker->firstName;
            $student->surname = $faker->lastName;
            $student->age = $faker->numberBetween(18, 30);
            $student->address = $faker->address;
            $student->save();
        }



    }
}
