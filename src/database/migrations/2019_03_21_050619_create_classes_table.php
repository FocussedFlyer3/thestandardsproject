<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->bigIncrements('class_id')->comment = 'Unique int number automatically assigned to a class';
            $table->integer('grade')->comment = 'The grade of the class';
            $table->string('subject')->comment = 'The subject that be teaching in the class';
            $table->biginteger('teacher_id')->unsigned()->comment = 'The teacher\'s user id that be teaching in the class';
            $table->foreign('teacher_id')->references('id')->on('users')->onDelete('cascade');
            $table->time('starts_at')->comment = 'The time the class starts';
            $table->time('ends_at')->comment = 'The time the class ends';
            $table->string('school')->comment = 'The subject code the class is labelled as';
            $table->string('room')->comment = 'The classroom the class will be carried out';
        });

        DB::statement('ALTER TABLE `classes` COMMENT = "This table stores all classes information"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classes');
    }
}
