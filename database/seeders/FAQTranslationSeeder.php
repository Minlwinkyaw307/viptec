<?php

namespace Database\Seeders;

use App\Models\FAQTranslation;
use Illuminate\Database\Seeder;

class FAQTranslationSeeder extends Seeder
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
                'faq_id'    => 1,
                'question' => 'Maket Bıçağı Nedir?',
                'answer' => "Maket bıçağı veya halk arasında bilinen adıyla falçata,metal veya plastik bir koruma sürgüsü içerisinde ileri geri hareket eden ve kilitleme mekanizması ile sabitlenebilen tek tarafı keskin bıçaktır.",
            ],
            [
                'language_id' => 2,
                'faq_id'    => 1,
                'question' => 'What is Utility Knife?',
                'answer' => "The Utility Knife also known as a Cutter/Snap off Blade is one of the tools that can be fixed and moved back by locking mechanism and can be used in daily life as well as for professional works.",
            ],
            [
                'language_id' => 1,
                'faq_id'    => 2,
                'question' => 'Maket Bıçağı Kullanım Alanları Nelerdir?',
                'answer' => "Maket bıçağının başlıca kullanım alanları fabrikalar, inşaat projeleri, okullar ve ofislerdir. Maket bıçağı sayesinde kesimi zor olan yüzeylerde kolayca ve güvenle istediğiniz şekilde kesim yapabilirsiniz.",
            ],
            [
                'language_id' => 2,
                'faq_id'    => 2,
                'question' => 'What Are the Usage Areas of Utility Knife?',
                'answer' => "The main uses of utility knife are factories, construction projects, warehouses, schools and offices. Thanks to utility knife you can easly cut different materials which you may have difficulty with other tools.",
            ],

        ];

        FAQTranslation::insert($rows);
    }
}
