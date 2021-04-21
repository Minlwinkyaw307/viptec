<?php

namespace Database\Seeders;

use App\Models\Certificate;
use Illuminate\Database\Seeder;

class CertificateSeeder extends Seeder
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
                'image' => 'certificates/1.jpg',
                'order_no' => 1,
                'visible' => true,
            ],
            [
                'image' => 'certificates/2.jpg',
                'order_no' => 2,
                'visible' => true,
            ],
            [
                'image' => 'certificates/3.jpg',
                'order_no' => 3,
                'visible' => true,
            ],
            [
                'image' => 'certificates/4.jpg',
                'order_no' => 4,
                'visible' => true,
            ],
        ];

        Certificate::insert($rows);
    }
}
