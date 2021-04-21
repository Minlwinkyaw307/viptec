<?php

namespace Database\Seeders;

use App\Models\BlogTranslation;
use Illuminate\Database\Seeder;

class BlogTranslationSeeder extends Seeder
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
                'blog_id' => 1,
                'title' => "Maket Bıçağının Yanlış Kullanımı ve Dikkat Edilmesi Gereken Hususlar",
                'content' => view('seeder.tr_blog_1'),
            ],
            [
                'language_id' => 1,
                'blog_id' => 1,
                'title' => "Improper Use Of Utility Knife And How to Use It Properly",
                'content' => view('seeder.en_blog_1'),
            ],
            [
                'language_id' => 1,
                'blog_id' => 2,
                'title' => "Maket Bıçağı Kullanımı İle İlgili 10 Önemli Tavsiye",
                'content' => view('seeder.tr_blog_2'),
            ],
            [
                'language_id' => 1,
                'blog_id' => 2,
                'title' => "10 Important Utility Knife Tips",
                'content' => view('seeder.en_blog_2'),
            ]
        ];

        BlogTranslation::insert($rows);
    }
}
