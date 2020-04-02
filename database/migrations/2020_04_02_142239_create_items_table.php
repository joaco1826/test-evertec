<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 80);
            $table->string('image', 200);
            $table->decimal("price", 19,2);
            $table->unsignedBigInteger('product_id')->index();
            $table->foreign('product_id')->references('id')->on('products');
            $table->unsignedBigInteger('order_id')->index();
            $table->foreign('order_id')->references('id')->on('orders');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
