<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
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
                'image' => 'galleries/1.jpg',
                'order_no' => 1,
                'visible' => true,
            ],
            [
                'image' => 'galleries/2.jpg',
                'order_no' => 2,
                'visible' => true,
            ],
            [
                'image' => 'galleries/3.jpg',
                'order_no' => 3,
                'visible' => true,
            ],
            [
                'image' => 'galleries/2.jpg',
                'order_no' => 4,
                'visible' => true,
            ],
            [
                'image' => 'galleries/1.jpg',
                'order_no' => 5,
                'visible' => true,
            ],

        ];

        Gallery::insert($rows);
    }
}
