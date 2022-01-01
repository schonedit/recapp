<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSavingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('savings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('category', 255);
            $table->unsignedBigInteger('post_id')->length(10)->unsigned();
            $table->foreign('post_id')->references('id')->on('posts')->length(10);
            $table->unsignedBigInteger('user_id')->length(10)->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->length(10);
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
        Schema::dropIfExists('savings');
    }
}
