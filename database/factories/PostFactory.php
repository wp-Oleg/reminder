<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'content' => $this->faker->sentence,
            'image' => 'photo1.png',
            'date' => '08/09/17',
            'views' => $this->faker->numberBetween(0, 5000),
            'category_id' => 10,
            'user_id' => 1,
            'status' => 1,
            'is_featured' => 0
        ];
    }
}
