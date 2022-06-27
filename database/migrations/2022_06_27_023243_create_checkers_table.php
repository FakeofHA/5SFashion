<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkers', function (Blueprint $table) {
            $table->id();
            $table->integer('amount');
            $table->unsignedBigInteger('cartId');
			$table->foreign('cartId')->references('id')->on('carts');
            $table->unsignedBigInteger('sizeId');
			$table->foreign('sizeId')->references('id')->on('sizes');
            $table->unsignedBigInteger('goodId');
			$table->foreign('goodId')->references('id')->on('goods');
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
        Schema::dropIfExists('checkers');
    }
}
