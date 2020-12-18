<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
            Review::create([
                'product_id' => rand(1, 50),
                'customer' => Str::random(7),
                'review' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, officiis,
                              dolorem laborum repudiandae inventore',
                'rating' => rand(0, 5)
            ]);
        }
    }
}
