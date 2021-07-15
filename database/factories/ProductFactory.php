<?php

namespace Database\Factories;

use App\Models\category;
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

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'cate_id' => Category::all()->random()->id,
            'image' => 'https://source.unsplash.com/random',
            // 'image' => $this->faker->image('public/storage/images',640,480, null, false),
            'price' => rand(0, 100000),
            'status' => rand(0,1),
            'quantity' => rand(0,100),
            'detail' => $this->faker->sentence(200),
        ];
    }
}
