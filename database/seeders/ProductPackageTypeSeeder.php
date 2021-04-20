<?php

namespace Database\Seeders;

use App\Models\ProductPackageType;
use Illuminate\Database\Seeder;

class ProductPackageTypeSeeder extends Seeder
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
                'package_type_id' => 1,
                'image' => 'package_types/1.jpg'
            ],
            [
                'product_id' => 1,
                'package_type_id' => 2,
                'image' => 'package_types/2.jpg'
            ],
            [
                'product_id' => 1,
                'package_type_id' => 3,
                'image' => 'package_types/3.jpg'
            ],
            [
                'product_id' => 1,
                'package_type_id' => 4,
                'image' => 'package_types/4.jpg'
            ],
        ];

        $blade_rows = [
            [
                'product_id' => 2,
                'package_type_id' => 5,
                'amount' => 10,
            ],
            [
                'product_id' => 2,
                'package_type_id' => 6,
                'amount' => 100,
            ],
            [
                'product_id' => 2,
                'package_type_id' => 7,
                'amount' => 3600,
            ],
        ];

        ProductPackageType::insert($rows);
        ProductPackageType::insert($blade_rows);
    }
}
