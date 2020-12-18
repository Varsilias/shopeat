<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 50; $i++) {
            Product::create([
                'photo' => 'https://placeimg.com/400/300/any?'.rand(20000, 90000),
                'name' => Str::random(7),
                'price' => rand(50, 1000),
                'stock' => rand(1, 10),
                'discount' => rand(10, 50),
                'details' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, officiis,
                              dolorem laborum repudiandae inventore'
                ]);
        }
    }
}
