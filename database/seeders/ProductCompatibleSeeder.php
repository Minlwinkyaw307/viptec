<?php

namespace Database\Seeders;

use App\Models\ProductCompatible;
use Illuminate\Database\Seeder;

class ProductCompatibleSeeder extends Seeder
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
                'blade_id' => 2,
            ]
        ];

        ProductCompatible::insert($rows);
    }
}
