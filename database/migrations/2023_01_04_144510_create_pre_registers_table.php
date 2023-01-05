<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_registers', function (Blueprint $table) {
            $table->id();
            $table->string('register_firstname');
            $table->string('register_lastname');
            $table->string('register_email');
            $table->integer('register_mobile_no');
            $table->integer('register_gender');
            $table->string('register_address');
            $table->string('register_meet_person_name');
            $table->integer('register_enter_by');
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
        Schema::dropIfExists('pre_registers');
    }
}
