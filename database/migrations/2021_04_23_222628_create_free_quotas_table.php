<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFreeQuotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('free_quotas', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('surname', 50);
            $table->string('email', 30);
            $table->string('phone', 30);
            $table->foreignIdFor(\App\Models\Product::class, 'product_id')
                ->constrained('products')
                ->cascadeOnDelete();
            $table->integer('piece');
            $table->text('message');
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
        Schema::dropIfExists('free_quotas');
    }
}
