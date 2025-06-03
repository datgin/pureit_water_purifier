<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class NewsSeeder extends Seeder
{
    public function run(): void
    {

        for ($i = 0; $i < 20; $i++) {
            $title = fake()->sentence(6);
            $slug = Str::slug($title);

            News::create([
                'title' => $title,
                'slug' => $slug,
                'image' => 'news/' . fake()->imageUrl(),
                'short_description' => fake()->text(150),
                'content' => fake()->paragraphs(5, true),
                'posted_at' => fake()->dateTimeBetween('-1 month', 'now'),
                'remove_at' => fake()->dateTimeBetween('+1 month', '+6 months'),
                'view_count' => fake()->numberBetween(0, 1000),
                'status' => fake()->randomElement([0, 1]),
                'seo_title' => fake()->sentence(6),
                'seo_description' => fake()->text(160),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
