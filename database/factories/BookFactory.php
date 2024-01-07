<?php

namespace Database\Factories;



use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'author_id' => $this->faker->numberBetween(1,30),
            'category_id' => $this->faker->numberBetween(1,50),
            'book_name' => $this->faker->sentence(2),
        ];
    }
}
