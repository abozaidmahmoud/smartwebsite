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
            $table->string('title',255);
            $table->string('subtitle',255);
            $table->string('slug',100)->unique();
            $table->boolean('status')->nullable();
            $table->integer('posted_by')->nullable();
            $table->text('body');
            $table->string('image',191)->nullable();
            $table->integer('like')->nullable();
            $table->integer('dislike')->nullable();
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
