<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments_replies', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('comment_id')->unsigned()->index();
          $table->integer('is_active')->default(0);
          $table->string('author');
          $table->string('email');
          $table->string('photo');
          $table->string('body');
          $table->timestamps();

          $table->foreign('comment_id')->references('id')->on('comments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comments_replies');
    }
}
