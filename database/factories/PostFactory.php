<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->unique()->name,
            'slug' => $this->faker->unique()->userName(),
            'description' => $this->faker->text(),
            'content' => $this->faker->text(),
            'thumbnail' => $this->faker->imageUrl(),
            'image' => $this->faker->imageUrl(1600, 900),
            'image_caption' => $this->faker->title(),
            'hot_date' => $this->faker->date(),
            'new_date' => $this->faker->date(),
            'category_id' => rand(1,5),
        ];
    }
}
