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
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'visible' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'visible' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Feature::insert($rows);
    }
}
