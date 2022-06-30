<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->mediumText('short_desc');
            $table->longText('sku');
            $table->string('product_title');
            $table->integer('main_price');
            $table->integer('sale_price')->nullable();
            $table->longText('long_desc')->nullable();
            $table->longText('information');
            $table->integer('quantity');
            $table->string('product_photo');
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
};
