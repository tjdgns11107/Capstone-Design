<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('buy_user');
            $table->unsignedBigInteger('product_id');
            $table->string('order_date');
            $table->string('send_user');
            $table->text('send_address');
            $table->string('payment')->default(0);
            $table->timestamps();

            $table->foreign('buy_user')->references('id')->
                on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('product_id')->references('id')->
                on('products')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
