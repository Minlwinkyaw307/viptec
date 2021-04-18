<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
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
                'id' => 1,
                'visible' => true,
            ],
            [
                'id' => 2,
                'visible' => true,
            ],
            [
                'id' => 3,
                'visible' => true,
            ],
            [
                'id' => 4,
                'visible' => true,
            ],
            [
                'id' => 5,
                'visible' => true,
            ],
            [
                'id' => 6,
                'visible' => true,
            ],
        ];

        Category::insert($rows);
    }
}
