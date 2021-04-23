<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'id' => 2,
            'category_id' => 6,
            'code' => 'VT874000',
            'image' => 'products/1.jpg',
            'length' => '60',
            'width' => '19',
            'thickness' => '0.60',
            'visible' => true,
        ]);

        Product::create([
            'id' => 1,
            'category_id' => 1,
            'code' => 'VT875101',
            'image' => 'products/2.jpg',
            'length' => '160',
            'width' => '18',
            'weight' => '79',
            'visible' => true,
        ]);
    }
}
