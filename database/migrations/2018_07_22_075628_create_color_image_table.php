<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColorImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('color_image', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('color_id')->unsigned()->nullable();
            $table->foreign('color_id')->references('id')
                ->on('colors');
            $table->integer('image_id')->unsigned()->nullable();
            $table->foreign('image_id')->references('id')
                ->on('images');
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
        Schema::dropIfExists('color_image');
    }
}
