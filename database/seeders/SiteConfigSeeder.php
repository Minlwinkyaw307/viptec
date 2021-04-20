<?php

namespace Database\Seeders;

use App\Models\SiteConfig;
use Illuminate\Database\Seeder;

class SiteConfigSeeder extends Seeder
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
                'logo' => 'configs/logo.png',
                'favicon' => 'configs/favicon.png',
                'phone' => '+902126909804',
                'email' => 'order@viptec.com.tr',
                'facebook' => 'https://facebook.com/',
                'linkedin' => 'https://linkedin.com/',
                'instagram' => 'http://instagram.com/',
                'youtube' => 'https://www.youtube.com/',
                'address' => 'Bağlar İçi Cd. No: 85 Firuzköy Avcılar/İstanbul',
                'catalogue_link' => 'configs/viptec-catalogue.pdf',
                'about_image' => 'configs/about.jpg',
                'quota_background' => 'configs/quota.jpg',
            ]
        ];

        SiteConfig::insert($rows);
    }
}
