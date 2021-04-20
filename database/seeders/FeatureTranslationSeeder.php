<?php

namespace Database\Seeders;

use App\Models\FeatureTranslation;
use Illuminate\Database\Seeder;

class FeatureTranslationSeeder extends Seeder
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
                'language_id' => 1,
                'feature_id' => 1,
                'name' => 'ABS Plastik Gövde'
            ],
            [
                'language_id' => 2,
                'feature_id' => 1,
                'name' => 'ABS Plastic Body'
            ],
            [
                'language_id' => 1,
                'feature_id' => 2,
                'name' => 'Kilitlenebilir'
            ],
            [
                'language_id' => 2,
                'feature_id' => 2,
                'name' => 'Lockable'
            ],
            [
                'language_id' => 1,
                'feature_id' => 3,
                'name' => 'Trapez Tipi Bıçak'
            ],
            [
                'language_id' => 2,
                'feature_id' => 3,
                'name' => 'Trapezoid Blade'
            ],
        ];

        FeatureTranslation::insert($rows);
    }
}
