<?php

namespace Database\Seeders;

use App\Models\CertificateTranslation;
use Illuminate\Database\Seeder;

class CertificateTranslationSeeder extends Seeder
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
                'certificate_id' => 1,
                'title' => 'Marka Tescil Belgesi'
            ],
            [
                'language_id' => 2,
                'certificate_id' => 1,
                'title' => 'Marka Tescil Belgesi'
            ],
            [
                'language_id' => 1,
                'certificate_id' => 2,
                'title' => 'Tasarım Tescil Belgesi'
            ],
            [
                'language_id' => 2,
                'certificate_id' => 2,
                'title' => 'Tasarım Tescil Belgesi'
            ],
            [
                'language_id' => 1,
                'certificate_id' => 3,
                'title' => 'Tasarım Tescil Belgesi 2016'
            ],
            [
                'language_id' => 2,
                'certificate_id' => 3,
                'title' => 'Tasarım Tescil Belgesi 2016'
            ],
            [
                'language_id' => 1,
                'certificate_id' => 4,
                'title' => 'Tasarım Tescil Belgesi 2017'
            ],
            [
                'language_id' => 2,
                'certificate_id' => 4,
                'title' => 'Tasarım Tescil Belgesi 2017'
            ],

        ];

        CertificateTranslation::insert($rows);
    }
}
