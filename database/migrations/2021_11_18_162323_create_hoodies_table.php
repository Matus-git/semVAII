<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoodiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoodies', function (Blueprint $table) {
            $table->id('id_hoodie');
            $table->foreignId('id_product')->nullable()->references('id_product')->on('products');
            $table->string('image');
            $table->string('name');
            $table->string('description');
            $table->string('color');
            $table->string('size',5);
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
        Schema::dropIfExists('hoodies');
    }
}
