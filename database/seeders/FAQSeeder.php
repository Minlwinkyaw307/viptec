<?php

namespace Database\Seeders;

use App\Models\FAQ;
use Illuminate\Database\Seeder;

class FAQSeeder extends Seeder
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
                'order_no' => 1,
                'visible' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_no' => 2,
                'visible' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        FAQ::insert($rows);
    }
}
