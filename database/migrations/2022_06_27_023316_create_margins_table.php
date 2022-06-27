<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarginsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('margins', function (Blueprint $table) {
            $table->id();
            $table->integer('cost');
            $table->integer('price');
            $table->integer('volume');
            $table->boolean('status');
            $table->unsignedBigInteger('amountId');
			$table->foreign('amountId')->references('id')->on('amounts');
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
        Schema::dropIfExists('margins');
    }
}
