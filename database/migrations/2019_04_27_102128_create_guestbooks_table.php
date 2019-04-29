<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuestbooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guestbooks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('entry');
            $table->date('date');
            $table->string('feeling')->nullable();
            
            $table->unsignedBigInteger('user_id');
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');;
            
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
        Schema::dropIfExists('guestbooks');
    }
}
