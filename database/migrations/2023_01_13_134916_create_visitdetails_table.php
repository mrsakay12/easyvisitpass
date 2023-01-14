<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitdetails', function (Blueprint $table) {
            $table->id();
            $table->string('visitor_firstname');
            $table->string('visitor_lastname');
            $table->string('visitor_email');
            $table->string('visitor_mobile_no');
            $table->string('visitor_gender');
            $table->string('visitor_address');
            $table->string('visitor_id');
            $table->integer('visitor_enter_by');
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
        Schema::dropIfExists('visitdetails');
    }
}
