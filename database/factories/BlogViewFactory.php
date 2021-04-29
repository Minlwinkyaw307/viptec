<?php

namespace Database\Factories;

use App\Models\BlogView;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogViewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BlogView::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'blog_id' => rand(1, 2),
            'ip' => $this->faker->ipv4,
        ];
    }
}
