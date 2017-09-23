<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NekktaFeeds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nekkta_feeds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('feed_name');
            $table->string('feed_description_1');
            $table->string('feed_description_2')->nullable();
            $table->string('feed_picture');
            $table->string('feed_icon')->nullable();
            $table->string('feed_group_id')->nullable();
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
        Schema::dropIfExists('nekkta_feeds');
    }
}
