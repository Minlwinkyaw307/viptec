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
            [
                'visible' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        PackageType::insert($rows);
    }
}
