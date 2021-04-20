<?php

namespace Database\Seeders;

use App\Models\ProductFeature;
use Illuminate\Database\Seeder;

class ProductFeatureSeeder extends Seeder
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
                'feature_id' => 1,
            ],
            [
                'product_id' => 1,
                'feature_id' => 2,
            ],
        ];

        ProductFeature::insert($rows);
    }
}
