<?php

namespace Database\Seeders;

use App\Models\Task; //wrote by me
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker; //wrote by me

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Task::create([
                'title' => $faker->sentence,
                'desc' => $faker->sentence,
            ]);
        }
    }
}

//php artisan db:seed --class=TaskSeeder
