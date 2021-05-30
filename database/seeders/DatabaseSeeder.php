<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory;
use App\Models\Today;
use App\Models\Upcoming;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 5; $i++) {
            Today::create([
                'completed' => false,
                'title' => $faker->sentence($nbWords = 5, $variableWords = false),
                'approved' => false,
                'taskId' => Str::random(10)
            ]);

            Upcoming::create([
                'completed' => false,
                'title' => $faker->sentence($nbWords = 5, $variableWords = false),
                'approved' => false,
                'waiting' => true,
                'taskId' => Str::random(10)
            ]);
        }
    }
}
