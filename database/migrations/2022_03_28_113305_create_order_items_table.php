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
            $table->foreignId('order_id')
                            ->constrained('orders')
                            ->cascadeOnDelete();
            $table->foreignId('book_id')
                            ->constrained('books');

            $table->unsignedFloat('price');
            $table->unsignedSmallInteger('quantity')->default(1);

            $table->unique(['order_id', 'book_id']);


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
