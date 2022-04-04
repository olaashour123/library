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
            //      $table->renameColumn('country','country_id');
            //   $table->foreignId('country_id')->constrained('countries')->change();
                 if (!Schema::hasColumn('order_addresses', 'country')) {
                     $table->dropColumn('country', 2);
                 }
               if(!Schema::hasColumn('order_addresses', 'country_id')) {
                $table->foreignId('country_id')->constrained('countries')->cascadeOnDelete()->after('phone');
            }

            //
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
