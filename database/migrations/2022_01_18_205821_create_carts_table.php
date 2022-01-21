<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable()->unsigned();
            $table->string('name');
            $table->string('phone');
            $table->string('address');
            $table->string('image');
            $table->decimal('price',8,2)->default(0);
            $table->integer('quantity')->default(0);
            $table->string('product_name');
            $table->decimal('subtotal')->default(0);
            $table->boolean('paid')->default(0);
            $table->boolean('delivered')->default(0);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('carts');
    }
}
