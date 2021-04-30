<?php

namespace Database\Factories;

use App\Models\ProductView;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductViewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductView::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => rand(1, 2),
            'viewed_at' => $this->faker->dateTimeBetween(now()->subMonth()),
            'ip' => $this->faker->ipv4,
        ];
    }
}
