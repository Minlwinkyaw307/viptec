<?php

namespace Database\Seeders;

use App\Models\ProductImage;
use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
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
                'product_id' => 1,
                'image' => 'products/1.jpg',
                'thumbnail' => 'products/1.jpg'
            ],
            [
                'product_id' => 1,
                'image' => 'products/1-1.jpg',
                'thumbnail' => 'products/1-1.jpg'
            ],
            [
                'product_id' => 1,
                'image' => 'products/1-2.jpg',
                'thumbnail' => 'products/1-2.jpg'
            ],
            [
                'product_id' => 1,
                'image' => 'products/1-3.jpg',
                'thumbnail' => 'products/1-3.jpg'
            ],
            [
                'product_id' => 2,
                'image' => 'products/2.jpg',
                'thumbnail' => 'products/2.jpg'
            ]
        ];

        ProductImage::insert($rows);
    }
}
