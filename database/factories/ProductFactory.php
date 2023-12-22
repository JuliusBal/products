<?php

namespace Database\Factories;

use App\Models\Manufacturer;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'manufacturer_id' => Manufacturer::all()->random()->id,
            'name'            => ucfirst($this->faker->word),
            'price'           => $this->faker->randomFloat(2, 1, 1000),
            'available'       => $this->faker->boolean,
        ];
    }
}
