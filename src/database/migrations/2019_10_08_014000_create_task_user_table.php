<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_user', function (Blueprint $table) {
            $table->biginteger('task_id')->unsigned()->comment = 'Id of task that been assigned to user';
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
            $table->biginteger('user_id')->unsigned()->comment = 'Id of user that the task have been assigned to';
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->biginteger('score_id')->nullable()->unsigned()->comment = 'Id of score the user obtain for this task';
            $table->foreign('score_id')->references('score_id')->on('scores')->onDelete('cascade');
            $table->biginteger('assigned_by_id')->unsigned()->comment = 'Id of user that assigning this task';
            $table->foreign('assigned_by_id')->references('id')->on('users')->onDelete('cascade');
            $table->biginteger('status')->unsigned()->comment = 'Status of task ( 0 => undone, 1 => in progress, 2 => done)';
            $table->time('due_date')->comment = 'due date set by teacher';
            $table->unique(['task_id', 'user_id']);
        });

        DB::statement('ALTER TABLE `task_user` COMMENT = "This table serves as a pivot table for the relationship between users and tasks (module) table"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_user');
    }
}
