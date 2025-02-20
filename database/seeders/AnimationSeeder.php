<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Enums\SourceType;
use App\Models\Animation;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnimationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 25; $i++) {
            $title = Str::trim($faker->sentence(6), '.');
            $category = Category::where('scope', 'animation')->pluck('id')->toArray();

            $animation = Animation::create([
                'title' => $title,
                'slug' => Str::slug($title),
                'status' => $faker->randomElement(['publish', 'draft']),
                'description' => $faker->paragraph(),
                'category_id' => $faker->randomElement($category),
                'author_id' => 1,
                'source' => SourceType::YOUTUBE,
                'source_url' => Str::random(11),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
