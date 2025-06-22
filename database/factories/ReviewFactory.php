<?php

namespace Database\Factories;

use \App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{

    protected $model = Review::class;
    
    public function definition(): array
    {
        return [
            'book_id' => null,
            'review' => fake()->paragraph(),
            'rating' => fake()->numberBetween(1, 5),
            'created_at' => fake()->dateTimeBetween('-5 years'),
            'updated_at' => fake()-> dateTimeBetween('created_at', 'now')
        ];
    }

    public function good() {
        return $this->state(function(array $attributes){
            return [
                'rating' => fake()->numberBetween(4,5)
            ];
        });
    }

    public function average() {
        return $this->state(function(array $attributes){
            return [
                'rating' => 3
            ];
        });
    }

    public function bad() {
        return $this->state(function(array $attributes){
            return [
                'rating' => fake()->numberBetween(1,2)
            ];
        });
    }
}
