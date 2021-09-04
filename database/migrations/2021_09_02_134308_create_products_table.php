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
            $table->string('Product_name', 999);
            $table->string('Product_number')->nullable();
            $table->longText('description');
            $table->string('position')->nullable();
            $table->string('weight')->nullable();
            $table->decimal('cost');
            $table->decimal('price');
            $table->string('quantity');
            $table->string('less_quantity');
            $table->string('Factory_No')->nullable();
            $table->string('photo')->nullable();
            $table->foreignId('store_id')->references('id')->on('stores')->onDelete('cascade');
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
