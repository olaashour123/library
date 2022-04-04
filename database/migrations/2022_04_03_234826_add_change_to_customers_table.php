<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddChangeToCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
             $table->renameColumn('name','first_name');

              $table->string('last_name')->after('first_name');
              $table->string('phone')->after('image');
              $table->foreignId('country_id')->constrained('countries')->cascadeOnDelete()->after('phone');
              $table->string('city')->after('country_id');
              $table->string('postcode')->after('city');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
              $table->renameColumn('first_name','name');
               $table->dropColumn('last_name');
                 $table->dropColumn('phone');
                $table->dropColumn('country_id');
                 $table->dropColumn('city');
                 $table->dropColumn('postcode');




        });
    }
}
