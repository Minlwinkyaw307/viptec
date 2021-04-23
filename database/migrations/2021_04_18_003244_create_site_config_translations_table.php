<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteConfigTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_config_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Language::class, 'language_id')
                ->constrained('languages')->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\SiteConfig::class, 'site_config_id')
                ->constrained('site_configs')->cascadeOnDelete();
            $table->string('title');
            $table->string('site_name');
            $table->text('description');

            $table->string('about_title');
            $table->text('about_description');
            $table->longText('vision');

            $table->string('quota_title');
            $table->string('quota_description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_config_translations');
    }
}
