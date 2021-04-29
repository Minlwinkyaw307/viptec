<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
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
                'image' => 'blogs/1.jpg',
                'thumbnail' => 'blogs/t1.jpg',
                'visible' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'blogs/2.jpg',
                'thumbnail' => 'blogs/t2.jpg',
                'visible' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Blog::insert($rows);
    }
}
