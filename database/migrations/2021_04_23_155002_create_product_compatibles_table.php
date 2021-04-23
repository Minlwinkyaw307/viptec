<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCompatiblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_compatibles', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Product::class, 'product_id')
                ->constrained('products')->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Product::class, 'blade_id')
                ->constrained('products')->cascadeOnDelete();
            $table->softDeletes();
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
        Schema::dropIfExists('product_compatibles');
    }
}
