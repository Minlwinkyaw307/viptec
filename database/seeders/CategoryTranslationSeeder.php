<?php

namespace Database\Seeders;

use App\Models\CategoryTranslation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoryTranslationSeeder extends Seeder
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
                'category_id' => 1,
                'name' => 'Metal Gövde Maket Bıçakları',
                'slug' => Str::slug('Metal Gövde Maket Bıçakları') . '-' . Str::random(5),
            ],
            [
                'language_id' => 1,
                'category_id' => 2,
                'name' => 'Plastik Gövde Maket Bıçakları',
                'slug' => Str::slug('Plastik Gövde Maket Bıçakları') . '-' . Str::random(5),
            ],
            [
                'language_id' => 1,
                'category_id' => 3,
                'name' => 'Güvenlikli Maket Bıçakları',
                'slug' => Str::slug('Güvenlikli Maket Bıçakları') . '-' . Str::random(5),
            ],
            [
                'language_id' => 1,
                'category_id' => 4,
                'name' => 'Klipsli Maket Bıçakları',
                'slug' => Str::slug('Klipsli Maket Bıçakları') . '-' . Str::random(5),
            ],
            [
                'language_id' => 1,
                'category_id' => 5,
                'name' => 'Halıcı Tip Maket Bıçakları',
                'slug' => Str::slug('Halıcı Tip Maket Bıçakları') . '-' . Str::random(5),
            ],
            [
                'language_id' => 1,
                'category_id' => 6,
                'name' => 'Maket Bıçağı Yedekleri',
                'slug' => Str::slug('Maket Bıçağı Yedekleri') . '-' . Str::random(5),
            ],

            [
                'language_id' => 2,
                'category_id' => 1,
                'name' => 'Metal Body Utility Knives',
                'slug' => Str::slug('Metal Body Utility Knives') . '-' . Str::random(5),
            ],
            [
                'language_id' => 2,
                'category_id' => 2,
                'name' => 'Plastic Body Utility Knives',
                'slug' => Str::slug('Plastic Body Utility Knives') . '-' . Str::random(5),
            ],
            [
                'language_id' => 2,
                'category_id' => 3,
                'name' => 'Safety Utility Knives',
                'slug' => Str::slug('Safety Utility Knives') . '-' . Str::random(5),
            ],
            [
                'language_id' => 2,
                'category_id' => 4,
                'name' => 'Precision Utility Knives',
                'slug' => Str::slug('Precision Utility Knives') . '-' . Str::random(5),
            ],
            [
                'language_id' => 2,
                'category_id' => 5,
                'name' => 'Spare Blades',
                'slug' => Str::slug('Spare Blades') . '-' . Str::random(5),
            ],
            [
                'language_id' => 2,
                'category_id' => 6,
                'name' => 'Scrapers',
                'slug' => Str::slug('Scrapers') . '-' . Str::random(5),
            ],
        ];

        CategoryTranslation::insert($rows);
    }
}
