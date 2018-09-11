<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('event_id');

            $table->enum('status', ['on-hold', 'processing', 'rejected', 'accepted', 'withdrawn']);

            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
            $table->foreign('event_id')
                  ->references('id')->on('events')
                  ->onDelete('cascade');

            $table->unique(['user_id', 'event_id']);

            $table->softDeletes();
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
        Schema::dropIfExists('applications');
    }
}
