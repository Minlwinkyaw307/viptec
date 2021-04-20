<?php

namespace Database\Seeders;

use App\Models\PackageTypeTranslation;
use Illuminate\Database\Seeder;

class PackageTypeTranslationSeeder extends Seeder
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
                'package_type_id' => 1,
                'name' => 'Blister'
            ],
            [
                'language_id' => 2,
                'package_type_id' => 1,
                'name' => 'Blister'
            ],
            [
                'language_id' => 1,
                'package_type_id' => 2,
                'name' => 'T Kartela'
            ],
            [
                'language_id' => 2,
                'package_type_id' => 2,
                'name' => 'Body Sleeve'
            ],
            [
                'language_id' => 1,
                'package_type_id' => 3,
                'name' => 'Teşhir Ürünü'
            ],
            [
                'language_id' => 2,
                'package_type_id' => 3,
                'name' => 'Display Box'
            ],
            [
                'language_id' => 1,
                'package_type_id' => 4,
                'name' => 'Standart Kutu'
            ],
            [
                'language_id' => 2,
                'package_type_id' => 4,
                'name' => 'Standard Box'
            ],
            [
                'language_id' => 1,
                'package_type_id' => 5,
                'name' => 'Tüp Adedi'
            ],
            [
                'language_id' => 2,
                'package_type_id' => 5,
                'name' => ' Tube Quantity'
            ],
            [
                'language_id' => 1,
                'package_type_id' => 6,
                'name' => 'Kutu İçi Adedi'
            ],
            [
                'language_id' => 2,
                'package_type_id' => 6,
                'name' => 'Box Quantity'
            ],
            [
                'language_id' => 1,
                'package_type_id' => 7,
                'name' => 'Koli İçi Adedi'
            ],
            [
                'language_id' => 2,
                'package_type_id' => 7,
                'name' => ' Carton Quantity'
            ],
        ];

        PackageTypeTranslation::insert($rows);
    }
}
