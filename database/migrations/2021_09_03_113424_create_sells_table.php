<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sells', function (Blueprint $table) {
            $table->id();
            $table->text('client');
            $table->date('pay_date');
            $table->string('cash_status');
            $table->float('in_pocket');
            $table->text('barcode');
            $table->integer('product_number');
            $table->text('description');
            $table->float('price');
            $table->decimal('tax');
            $table->text('quantity');
            $table->string('total');
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
        Schema::dropIfExists('sells');
    }
}
