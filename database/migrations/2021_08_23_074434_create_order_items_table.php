<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->string('order_number');
            $table->string('crop_id');
            $table->string('crop_title');
            $table->string('crop_description');
            $table->string('crop_price');
            $table->string('crop_unit');
            $table->string('payment_status')->default('PENDING');
            $table->string('delivery_status')->default('PENDING');
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
        Schema::dropIfExists('order_items');
    }
}
