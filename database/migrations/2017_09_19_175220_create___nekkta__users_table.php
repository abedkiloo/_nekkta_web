<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNekktaUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__nekkta__users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nekkta_user_first_name')->nullable();
            $table->string('nekkta_user_second_name')->nullable();
            $table->string('nekkta_user_user_name');
            $table->string('nekkta_user_user_email');
            $table->string('nekkta_user_user_password');
            $table->string('nekkta_user_user_id_number')->nullable()->unique();
            $table->string('nekkta_user_user_phone_number')->nullable()->unique();
            $table->string('nekkta_user_user_account_number')->nullable()->unique();
            $table->string('nekkta_user_user_account_picture')->nullable()->unique();
            $table->string('nekkta_user_user_account_tag_line')->nullable();
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
        Schema::dropIfExists('__nekkta__users');
    }
}
