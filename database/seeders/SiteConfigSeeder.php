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
                'fax' => '+902126909809',
                'email' => 'order@viptec.com.tr',
                'facebook' => 'https://facebook.com/',
                'linkedin' => 'https://linkedin.com/',
                'instagram' => 'http://instagram.com/',
                'youtube' => 'https://www.youtube.com/',
                'tutorial_link' => 'https://www.youtube.com/embed/vTUlG5_qgNg',
                'location' => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d96355.9988003104!2d28.71559!3d41.000638!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x511b4650c9f9824f!2sAr%20Metal!5e0!3m2!1sen!2str!4v1619105493231!5m2!1sen!2str" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
                'address' => 'Bağlar İçi Cd. No: 85 Firuzköy Avcılar/İstanbul',
                'catalogue_link' => 'configs/viptec-catalogue.pdf',
                'about_image' => 'configs/about.jpg',
                'quota_background' => 'configs/quota.jpg',
            ]
        ];

        SiteConfig::insert($rows);
    }
}
