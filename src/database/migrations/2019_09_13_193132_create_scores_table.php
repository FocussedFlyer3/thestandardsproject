<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->bigIncrements('score_id')->comment = 'Unique int id for each score recorded';
            $table->biginteger('user_id')->unsigned()->comment = 'Id of the user that scored this';
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->double('score', 5, 2)->comment = 'The score obtained';
            $table->biginteger('class_id')->unsigned()->comment = 'The class id that this score belongs to';
            $table->foreign('class_id')->references('class_id')->on('classes')->onDelete('cascade')->comment;
            $table->timestamps();
        });

        DB::statement('ALTER TABLE `scores` COMMENT = "This table stores students\' scores"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scores');
    }
}
