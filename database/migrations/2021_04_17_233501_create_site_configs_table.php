<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_configs', function (Blueprint $table) {
            $table->id();
            $table->text('logo');
            $table->text('favicon');
            $table->string('phone', 20);
            $table->string('fax', 20);
            $table->string('email', 50);
            $table->string('facebook', 150);
            $table->string('linkedin', 150);
            $table->string('instagram', 150);
            $table->string('youtube', 150);
            $table->string('tutorial_link', 150);
            $table->text('location');
            $table->text('address');
            $table->text('catalogue_link');
            $table->text('about_image');
            $table->text('quota_background');
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
        Schema::dropIfExists('site_configs');
    }
}
