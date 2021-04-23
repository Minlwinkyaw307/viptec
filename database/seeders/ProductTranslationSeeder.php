<?php

namespace Database\Seeders;

use App\Models\ProductTranslation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductTranslationSeeder extends Seeder
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
                'language_id' => 2,
                'product_id' => 1,
                'title' => 'VT875101 Professional Utility Knife',
                'slug' => Str::slug('VT875101 Professional Utility Knife'),
                'description' => "VIP-TEC VT875101 utility knife is designed for all kinds of professional cutting works. The ABS plastic body which consisting of two components offers two different color options.  VT875101 model is suitable  to cut different materials such as cardboards, adhesive tapes, foils, paper, plastic strips, foam, textile materials, upholstery, PVC, rubber, felt, leather etc.",
                'color' => 'Red,Blue,Yellow,Green',
            ],
            [
                'language_id' => 1,
                'product_id' => 1,
                'title' => 'VT875101 Profesyonel Maket Bıçağı',
                'slug' => Str::slug('VT875101 Profesyonel Maket Bıçağı'),
                'description' => "VIP-TEC VT875101 maket bıçağı her türlü profesyonel kesimleriniz için uygundur. Çift komponentten oluşan ABS plastik gövdesi iki farklı renk seçeneği sunmaktadır. VT875101 modeli ile kartonlar, yapışkan bantlar, folyolar, kağıt, plastik şeritler, köpük, tekstil malzemeleri, döşemeler, PVC, kauçuk, keçe, deri vb. malzemeler kolaylıkla ve güvenle kesilebilir.",
                'color' => 'Kırmızı, Mavi, Sarı, Yeşil'
            ],
        ];

        $blade_rows = [
            [
                'language_id' => 2,
                'product_id' => 2,
                'title' => 'VT874000 Trapezoid Spare Blade',
                'slug' => Str::slug('VT874000 Trapezoid Spare Blade'),
            ],
            [
                'language_id' => 1,
                'product_id' => 2,
                'title' => 'VT874000 Trapez Tipi Maket Bıçağı Yedeği',
                'slug' => Str::slug('VT874000 Trapez Tipi Maket Bıçağı Yedeği'),
            ],
        ];

        ProductTranslation::insert($rows);
        ProductTranslation::insert($blade_rows);
    }
}
