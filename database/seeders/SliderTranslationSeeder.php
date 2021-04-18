<?php

namespace Database\Seeders;

use App\Models\SliderTranslation;
use Illuminate\Database\Seeder;

class SliderTranslationSeeder extends Seeder
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
                'slider_id' => 1,
                'title' => "Sağlam, Güçlü, Keskin ve Güvenli",
                "description" => "VIP-TEC Maket bıçakları ile hayatınızı kolaylaştırın.",
                "link" => "/",
                "btn_title" => "ÜRÜNLERİ İNCELE",
            ],
            [
                'language_id' => 2,
                'slider_id' => 1,
                'title' => "Sağlam, Güçlü, Keskin ve Güvenli",
                "description" => "VIP-TEC Maket bıçakları ile hayatınızı kolaylaştırın.",
                "link" => "/",
                "btn_title" => "ÜRÜNLERİ İNCELE",
            ],
            [
                'language_id' => 1,
                'slider_id' => 2,
                'title' => "Sağlam, Güçlü, Keskin ve Güvenli",
                "description" => "VIP-TEC Maket bıçakları ile hayatınızı kolaylaştırın.",
                "link" => "/",
                "btn_title" => "ÜRÜNLERİ İNCELE",
            ],
            [
                'language_id' => 2,
                'slider_id' => 2,
                'title' => "Sağlam, Güçlü, Keskin ve Güvenli",
                "description" => "VIP-TEC Maket bıçakları ile hayatınızı kolaylaştırın.",
                "link" => "/",
                "btn_title" => "ÜRÜNLERİ İNCELE",
            ],
            [
                'language_id' => 1,
                'slider_id' => 3,
                'title' => "Sağlam, Güçlü, Keskin ve Güvenli",
                "description" => "VIP-TEC Maket bıçakları ile hayatınızı kolaylaştırın.",
                "link" => "/",
                "btn_title" => "ÜRÜNLERİ İNCELE",
            ],
            [
                'language_id' => 2,
                'slider_id' => 3,
                'title' => "Sağlam, Güçlü, Keskin ve Güvenli",
                "description" => "VIP-TEC Maket bıçakları ile hayatınızı kolaylaştırın.",
                "link" => "/",
                "btn_title" => "ÜRÜNLERİ İNCELE",
            ]
        ];

        SliderTranslation::insert($rows);
    }
}
