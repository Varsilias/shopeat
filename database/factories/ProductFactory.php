<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    public $width;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'photo' => $this->faker->imageUrl(400, 300, $this->faker->numberBetween(10, 200)),
            'name' => $this->faker->word,
            'price' => $this->faker->numberBetween(100, 1000),
            'stock' => $this->faker->randomDigit,
            'discount' => $this->faker->numberBetween(2, 50),
            'details' => $this->faker->paragraph
        ];
    }
}
