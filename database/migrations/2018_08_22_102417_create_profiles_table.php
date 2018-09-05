<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');

            $table->date('birth_date');

            $table->enum('gender', ['ذكر', 'أنثى']);
            $table->string('prefered_times', 30);
            $table->string('skills', 500);
            $table->string('twitter', 40)->nullable();
            $table->string('instegram', 40)->nullable();
            $table->string('experiences', 500);
            $table->string('city', 30);

            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');

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
        Schema::dropIfExists('profiles');
    }
}
