<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->string('visitor_code');
            $table->string('visitor_firstname');
            $table->string('visitor_lastname');
            $table->string('visitor_email');
            $table->integer('visitor_mobile_no');
            $table->integer('visitor_gender');
            $table->string('visitor_address');
            $table->string('visitor_id');
            $table->string('visitor_meet_person_name');
            $table->string('visitor_purpose');
            $table->dateTime('visitor_enter_time');
            $table->dateTime('visitor_out_time');
            $table->enum('visitor_status', ['In', 'Out','Pending','Rejected']);
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
        Schema::dropIfExists('visitors');
    }
}
