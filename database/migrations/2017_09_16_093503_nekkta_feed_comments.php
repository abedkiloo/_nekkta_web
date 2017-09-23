<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NekktaFeedComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nekkta_feed_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('feed_id');
            $table->integer('user_id');
            $table->string('comment_details');
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
        Schema::dropIfExists('nekkta_feed_comments');
    }
}
