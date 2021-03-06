<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignkey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('password_resets', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('place_images', function (Blueprint $table) {
            $table->foreign('place_id')->references('id')->on('places');
        });

        Schema::table('bookmarks', function (Blueprint $table) {
            $table->foreign('place_id')->references('id')->on('places');
        });

        Schema::table('bookmarks', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('likes', function (Blueprint $table) {
            $table->foreign('post_id')->references('id')->on('posts');
        });

        Schema::table('likes', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('hotels', function (Blueprint $table) {
            $table->foreign('place_id')->references('id')->on('places');
        });

        Schema::table('reports', function (Blueprint $table) {
            $table->foreign('post_id')->references('id')->on('posts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foreignkey');
    }
}
