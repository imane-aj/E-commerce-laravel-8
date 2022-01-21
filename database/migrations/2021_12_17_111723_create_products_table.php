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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug',191);
            $table->string('description');
            $table->decimal('price',8,2)->default(0);
            $table->string('image');
            $table->bigInteger('cat_name')->unsigned();
            $table->bigInteger('brand_name')->unsigned()->nullable();
            $table->integer('quantity')->default(0);
            $table->integer('remise')->default(0);
            $table->string('from');
            $table->integer('recommended')->default(0);
            $table->integer('reviews')->default(0);
            $table->foreign('cat_name')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('brand_name')->references('id')->on('brands')->onDelete('cascade');
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
