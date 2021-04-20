<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
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
                'visible' => true,
            ],
            [
                'visible' => true,
            ],
            [
                'visible' => true,
            ],
        ];

        Feature::insert($rows);
    }
}
