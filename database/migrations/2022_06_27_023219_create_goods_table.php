<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('classifyId');
			$table->foreign('classifyId')->references('id')->on('classifies');
            $table->unsignedBigInteger('userId');
			$table->foreign('userId')->references('id')->on('users');
            $table->unsignedBigInteger('segmentId');
			$table->foreign('segmentId')->references('id')->on('segments');
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
        Schema::dropIfExists('goods');
    }
}
