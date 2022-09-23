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
            $table->string('product_name');
            $table->string('description')->nullable();
            $table->string('size');
            $table->integer('price');
            $table->integer('quantity');
            $table->string('product_code')->nullable();
            $table->text('barcode')->nullable();
            $table->string('image');
            $table->string('category_id');
            $table->integer('alert_stock')->default('100');
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
