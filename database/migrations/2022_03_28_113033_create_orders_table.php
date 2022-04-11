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
           // $table->string('number')->unique();
           $table->foreignId('customer_id')->constrained('customers');
            //$table->foreign('address_id')->references('id')->on('order_addresses')->onDelete('cascade');
            $table->foreignId('address_id')->constrained('order_addresses');
            $table->unsignedFloat('discount')->default(0);
            $table->enum('status', ['pending', 'processing', 'cancelled', 'refunded']);
            $table->enum('payment_status', ['paid','not_paid']);

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
