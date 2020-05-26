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
            $table->id();
            $table->string("name");
            $table->string("description");
            $table->string("image");
            $table->string("stock");
            $table->string("price");
            $table->unsignedBigInteger('vendor_id');
            $table->foreign('vendor_id')
              ->references('id')->on('vendors')
              ->onDelete('cascade');
            $table->unsignedBigInteger('unit_id');
            $table->foreign('unit_id')
            ->references('id')->on('units')
            ->onDelete('cascade');
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
