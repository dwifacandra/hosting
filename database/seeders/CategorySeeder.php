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
        $scopes = ['post', 'animation', 'design'];
        for ($i = 0; $i < 10; $i++) {
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
