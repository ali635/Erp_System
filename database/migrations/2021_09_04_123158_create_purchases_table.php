<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->text('supplier');
            $table->date('pay_date');
            $table->string('cash_status');
            $table->float('in_pocket');
            $table->text('barcode');
            $table->integer('product_number');
            $table->text('description');
            $table->float('price');
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
        Schema::dropIfExists('purchases');
    }
}
