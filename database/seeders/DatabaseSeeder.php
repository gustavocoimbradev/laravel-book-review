<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Review;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Book::factory(15)->create()->each(function($book){
            $numReviews = random_int(5, 25);
            Review::factory($numReviews)
                ->good()
                ->for($book)
                ->create(); 
        });
        Book::factory(15)->create()->each(function($book){
            $numReviews = random_int(5, 25);
            Review::factory($numReviews)
                ->average()
                ->for($book)
                ->create(); 
        });
        Book::factory(15)->create()->each(function($book){
            $numReviews = random_int(5, 25);
            Review::factory($numReviews)
                ->bad()
                ->for($book)
                ->create(); 
        });
    }
}
