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
            $table->string('visitor_mobile_no');
            $table->string('visitor_gender');
            $table->string('visitor_address');
            $table->string('visitor_id');
            $table->string('visitor_meet_person_name');
            $table->string('visitor_purpose');
            $table->dateTime('visitor_enter_time');
            $table->dateTime('visit_time')->nullable();
            $table->dateTime('visitor_out_time')->nullable();
            $table->enum('visitor_status', ['In', 'Out','Pending','Rejected','Lobby']);
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
