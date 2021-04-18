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
            ],
            [
                'order_no' => 2,
                'visible' => true,
            ]
        ];

        FAQ::insert($rows);
    }
}
