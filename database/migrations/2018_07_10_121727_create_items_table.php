<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')
                ->on('users');
            $table->integer('unit_id')->unsigned()->nullable();
            $table->foreign('unit_id')->references('id')
                ->on('units');
            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')
                ->on('categories');
            $table->integer('subcategory_id')->unsigned()->nullable();
            $table->foreign('subcategory_id')->references('id')
                ->on('sub_categories');
            $table->integer('further_category_id')->unsigned()->nullable();
            $table->foreign('further_category_id')->references('id')
                ->on('further_categories');
            $table->string('provCode')->nullable();
            $table->string('citymunCode')->nullable();
            $table->string('brgyCode')->nullable();
            $table->string('name');
            $table->decimal('amount')->default(0);
            $table->integer('discount')->default(0);
            $table->string('short_desc')->nullable();
            $table->string('long_desc')->nullable();
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
        Schema::dropIfExists('items');
    }
}
