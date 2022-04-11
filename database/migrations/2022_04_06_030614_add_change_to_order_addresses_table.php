<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddChangeToOrderAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

 public function up()
    {
        Schema::table('order_addresses', function (Blueprint $table) {


             $table->unsignedBigInteger('country_id')->nullable()->after('phone');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_addresses', function (Blueprint $table) {
                $table->dropColumn('country_id');
        });
    }
}







