<?php

namespace Database\Seeders;

use App\Models\SiteConfigTranslations;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\View;

class SiteConfigTranslationsSeeder extends Seeder
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
                'language_id'   => 1,
                'site_config_id'    => 1,
                'title'     => 'VIP-TEC - Profesyonel Maket Bıçakları',
                'site_name' => 'VIP-TEC',
                'description' => 'Metal gövde maket bıçağı, plastik gövde maket bıçağı, güvenlikli maket bıçağı, klipsli maket bıçağı, halıcı tip maket bıçağı, maket bıçağı yedeği',
                'about_title' => 'VIP-TEC Hakkında',
                'about_description' => "Ar Metal ve Dövme El Aletleri San. ve Tic A.Ş. olarak VIP-TEC markamız ile sanayi ve mesleki kullanımın yanı sıra hobi ve promosyon amaçlı sağlam, güçlü, keskin ve güvenli maket bıçakları üretmekteyiz. Ayrıca maket bıçaklarımızın kalitesinin dünyanın birçok farklı ülkesinden beğeni ve ilgi görmesinin gururunu yaşamaktayız. VIP-TEC Maket Bıçakları birçok malzemeye ve değişik kesme işlemlerine uygun olarak üretilmektedir. VIP-TEC Maket Bıçaklarını farklı malzeme ve yüzeylerin kesim işlemlerinin yanı sıra günlük hayattaki işlerinizde de kullanabilirsiniz. VIP-TEC olarak müşterilerimizin renk, kutu, koli, baskı ve etiket ile ilgili özel taleplerini karşılayabilmekteyiz. Sizlere devamlı, çözüm odaklı ve güvenilir çalışma imkanı sunarak iş ortağınız olmaya ve gerekli tüm desteği sunmaya hazırız.",
                "vision" => view('seeder.tr_vision'),
            ],
            [
                'language_id'   => 2,
                'site_config_id'    => 1,
                'title'     => 'VIP-TEC - Professional Utility Knives',
                'site_name' => 'VIP-TEC',
                'description' => 'Metal body utility knife, plastic body utility knife, safe utility knife, Precision utility knife, spare blades',
                'about_title' => 'About VIP-TEC',
                'about_description' => 'As a VIP-TEC we produce strong sturdy sharp and safe Utility Knives which you can use for your hobbies and daily works as well as for your professional works. We are proud to see that,  VIP-TEC Utility Knives draw attention all over the world with their quality  . VIP-TEC Utility Knives are properly produced for various materials and and different cutting works. You can use VIP-TEC Utility Knives in your daily life as well as cutting different materials and surfaces.  We are able to meet our customers’ box color, logo and label demands. We are ready to become your business partner and provide all necessary support by offering you continuous, solution-oriented and reliable working opportunity.',
                'vision' => view('seeder.en_vision'),
            ],

        ];

        SiteConfigTranslations::insert($rows);
    }
}
