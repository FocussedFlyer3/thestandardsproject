<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id')->comment = 'Unique id for each user created';
            $table->string('name')->comment = 'Name of the user';
            $table->string('username')->unique()->comment = 'Username of the user';
            $table->string('email')->unique()->comment = 'Email address of the user';
            $table->timestamp('email_verified_at')->nullable()->comment = 'Timestamp when the email address of the user is verified';
            $table->string('password')->comment = 'Password created by the user (slow hashed)';
            $table->integer('role')->comment = 'Role of the user ( 0 => student, 1 => teacher)';
            $table->string('api_token', 60)->unique()->comment = 'randomly generated authorization token for every user created';
            $table->rememberToken();
            $table->timestamps();
        });

        DB::statement('ALTER TABLE `users` COMMENT = "This table stores user information"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
