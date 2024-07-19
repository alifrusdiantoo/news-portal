<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'slug' => Str::slug(fake()->sentence()),
            'img' => 'https://dummyimage.com/600x400/eee/2020.png&text=x',
            'title' => fake()->sentence(),
            'author_id' => User::factory(),
            'text' => fake()->text(1000),
            'category_id' => Category::factory()
        ];
    }
}
