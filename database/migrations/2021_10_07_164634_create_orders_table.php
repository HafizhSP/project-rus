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
            $table->id();
            $table->unsignedBigInteger('service_product_id')->nullable();
            $table->foreign('service_product_id')->references('id')->on('service_products')->onDelete('set null');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->string('target', 2500);
            $table->bigInteger('amount');
            $table->bigInteger('price');
            $table->bigInteger('spend');
            $table->string('status');
            $table->bigInteger('start');
            $table->bigInteger('remain');
            $table->string('custom_field', 2500)->nullable();
            $table->dateTime('date_added')->nullable();
            $table->dateTime('date_processed')->nullable();
            $table->dateTime('date_completed')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
