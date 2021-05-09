<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->integer('genre');
            $table->string('title');
            $table->text('contents');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('replys', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('topic_id');
            $table->integer('no');
            $table->unsignedBigInteger('user_id');
            $table->text('contents');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('topic_id')->references('id')->on('topics');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('topics');
        Schema::dropIfExists('replys');
    }
}
