<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJoinChallengesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('join_challenges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('challenge_id');
            $table->unsignedBigInteger('user_id');
            $table->date('join_date');
            $table->string('join_term');
            $table->unsignedBigInteger('entry_fee');
            $table->bigInteger('achivement')->nullable();
            $table->timestamps();

            $table->foreign('challenge_id')->references('id')
                ->on('challenges')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')
                ->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('join_challenges');
    }
}
