<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{

    protected $model = Book::class;	
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(rand(2,4)),
            'author' => fake()->name(),
            'created_at' => fake()->dateTimeBetween('-5 years'),
            'updated_at' => fake()-> dateTimeBetween('created_at', 'now')
        ];
    }
}
