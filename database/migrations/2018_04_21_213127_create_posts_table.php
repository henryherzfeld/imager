<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('USER_USERNAME', 72);
            $table->integer('USER_POST_ID')->default(1);
            $table->string('STATUS_TEXT')->default('');
            $table->string('STATUS_TITLE')->default('');
            $table->string('IMAGE_NAME')->default('');
            $table->string('IMAGE_PATH')->default('');
            $table->integer('IMAGE_FILTER')->default(0);
            $table->integer('EDIT')->default(0);
            $table->boolean('COMPLETE')->default(false);
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
        Schema::dropIfExists('posts');
    }
}
