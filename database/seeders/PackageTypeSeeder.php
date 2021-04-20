<?php

namespace Database\Seeders;

use App\Models\PackageType;
use Illuminate\Database\Seeder;

class PackageTypeSeeder extends Seeder
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
            [
                'visible' => true,
            ],
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

        PackageType::insert($rows);
    }
}
