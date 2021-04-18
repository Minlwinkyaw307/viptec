<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows = [
            [
                'order_no' => 1,
                'image' => 'sliders/slider-1.jpg',
                'visible' => true,
            ],
            [
                'order_no' => 2,
                'image' => 'sliders/slider-2.jpg',
                'visible' => true,
            ],
            [
                'order_no' => 3,
                'image' => 'sliders/slider-3.jpg',
                'visible' => true,
            ],

        ];

        Slider::insert($rows);
    }
}
