<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $scopes = ['photograph', 'post', 'animation', 'video', 'design', 'skill'];
        for ($i = 0; $i < 25; $i++) {
            $title = Str::trim($faker->sentence(2), '.');
            Category::create([
                'name' => $title,
                'slug' => Str::slug($title),
                'description' => $faker->sentence,
                'scope' => $faker->randomElement($scopes),
                'icon' => 'outline.category',
            ]);
        }
    }
}
