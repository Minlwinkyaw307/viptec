<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Category::class, 'category_id')
                ->constrained('categories')->cascadeOnDelete();
            $table->string('code', 100);
            $table->string('image');
            $table->integer('length');
            $table->integer('width');
            $table->integer('weight')->nullable();
            $table->decimal('thickness', 6, 2)->nullable();
            $table->foreignIdFor(\App\Models\Product::class, 'blade_id')
                ->nullable()
                ->constrained('products')->nullOnDelete();
            $table->boolean('visible');
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
        Schema::dropIfExists('products');
    }
}
