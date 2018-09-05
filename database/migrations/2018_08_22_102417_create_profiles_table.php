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
            $table->enum('gender', ['male', 'female']);
            $table->string('city', 100);
            $table->string('academic_degree', 100);
            $table->string('occupation', 100);
            $table->string('preferred_times', 100);
            $table->string('languages', 100);
            $table->string('typing_speed', 100)->nullable();
            $table->text('skills')->nullable();
            $table->text('experiences')->nullable();
            $table->string('twitter', 100)->nullable();
            $table->string('instegram', 100)->nullable();

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
