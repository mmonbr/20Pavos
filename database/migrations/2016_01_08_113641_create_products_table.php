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
            $table->string('short_description');
            $table->text('long_description');
            $table->integer('current_price');
            $table->integer('hits')->unsigned()->default(0);
            $table->boolean('is_featured')->unsigned()->default(false);
            $table->string('image_url');
            $table->string('referral_link');
            $table->string('ASIN')->nullable();
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
