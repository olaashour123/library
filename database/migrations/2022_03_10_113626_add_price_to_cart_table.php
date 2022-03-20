<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPriceToCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cart', function (Blueprint $table) {
            //
                 if(!Schema::hasColumn('cart', 'price')) {
                $table->float('price')->after('book_id');
            }
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cart', function (Blueprint $table) {
            //
             if(Schema::hasColumn('cart', 'price')) {
                $table->dropColumn('price');
            }
        });
    }
}
