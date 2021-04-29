<?php

namespace Database\Seeders;

use App\Models\BlogView;
use App\Models\CategoryTranslation;
use App\Models\ContactMessage;
use App\Models\FAQTranslation;
use App\Models\SiteConfigTranslations;
use App\Models\SliderTranslation;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            LanguageSeeder::class,
            SiteConfigSeeder::class,
            SiteConfigTranslationsSeeder::class,
            SliderSeeder::class,
            SliderTranslationSeeder::class,
            FAQSeeder::class,
            FAQTranslationSeeder::class,
            CategorySeeder::class,
            CategoryTranslationSeeder::class,
            ProductSeeder::class,
            ProductTranslationSeeder::class,
            FeatureSeeder::class,
            FeatureTranslationSeeder::class,
            PackageTypeSeeder::class,
            PackageTypeTranslationSeeder::class,
            ProductFeatureSeeder::class,
            ProductPackageTypeSeeder::class,
            ProductCompatibleSeeder::class,
            ProductImageSeeder::class,
            GallerySeeder::class,
            BlogSeeder::class,
            BlogTranslationSeeder::class,
            CertificateSeeder::class,
            CertificateTranslationSeeder::class,
        ]);
         BlogView::factory(50)->create();
         ContactMessage::factory(50)->create();
         User::factory(1)->create();
    }
}
