<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->integer('price');
            $table->text('description');
            $table->string('image_path');
            $table->integer('providable_id');
            $table->string('providable_type');
            $table->string('video_url')->nullable();
            $table->integer('hits')->unsigned()->default(0);
            $table->boolean('featured')->unsigned()->default(false);
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
        Schema::drop('products');
    }
}
