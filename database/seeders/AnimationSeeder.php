<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;


class AnimationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        // Generate 10 sample posts
        for ($i = 0; $i < 10; $i++) {
            $title = Str::trim($faker->sentence(6), '.');
            DB::table('animations')->insert([
                'title' => $title,
                'slug' => Str::slug($title),
                'status' => $faker->randomElement(['publish', 'draft']),
                'description' => $faker->paragraph(),
                'category_id' => $faker->numberBetween(1, 5),
                'author_id' => 1,
                'source' => 'YouTube',
                'source_url' => 'https://www.youtube.com/watch?v=' . Str::random(11),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
