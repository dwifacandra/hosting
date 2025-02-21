<?php

namespace Database\Seeders;

use App\Models\{Post, Category};
use App\Enums\{PostStatus, PostScope, SourceType};
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 25; $i++) {
            $title = Str::trim($faker->sentence(6), '.');
            $category = Category::where('scope', PostScope::POST)->pluck('id')->toArray();

            $animation = Post::create([
                'title' => $title,
                'slug' => Str::slug($title),
                'scope' => PostScope::POST,
                'status' => $faker->randomElement(PostStatus::cases())->value,
                'content' => $faker->paragraph(),
                'category_id' => $faker->randomElement($category),
                'author_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
