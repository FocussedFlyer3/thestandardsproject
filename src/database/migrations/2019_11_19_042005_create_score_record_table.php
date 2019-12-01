<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoreRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('score_record', function (Blueprint $table) {
            $table->biginteger('score_id')->unsigned();
            $table->foreign('score_id')->references('score_id')->on('scores')->onDelete('cascade');
            $table->biginteger('record_id')->unsigned();
            $table->foreign('record_id')->references('id')->on('records')->onDelete('cascade');
            $table->unique(['score_id', 'record_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('score_record');
    }
}
