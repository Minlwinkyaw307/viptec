<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
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
                'code'                  => 'tr',
                'name'                  => 'Turkish',
                'original_name'         => 'Türkçe',
            ],
            [
                'code'                  => 'en',
                'name'                  => 'English',
                'original_name'         => 'English',
            ]
        ];

        Language::insert($rows);
    }
}
