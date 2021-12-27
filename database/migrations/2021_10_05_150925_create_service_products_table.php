<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_category_id')->nullable();
            $table->foreign('service_category_id')->references('id')->on('service_categories')->onDelete('set null');
            $table->unsignedBigInteger('api_vendor_id')->nullable();
            $table->foreign('api_vendor_id')->references('id')->on('api_vendors')->onDelete('set null');
            $table->integer('api_id');
            $table->string('name', 250);
            $table->integer('min');
            $table->integer('max');
            $table->bigInteger('hbeli');
            $table->bigInteger('hjual');
            $table->tinyInteger('status');
            $table->string('desc', 600);
            $table->tinyInteger('column_status');
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
        Schema::dropIfExists('service_products');
    }
}
