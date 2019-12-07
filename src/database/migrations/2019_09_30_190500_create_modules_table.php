<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->bigIncrements('id')->comment = 'Unique id automatically assigned for each target';
            $table->string('subject')->comment = 'Name of the subject the target is for';
            $table->biginteger('grade')->unsigned()->comment = 'Grade level the target is for';
            $table->string('name')->comment = 'Name of the target';
            $table->string('description')->comment = 'Description of the target';
            $table->string('details')->comment = 'More details about the target';
            $table->timestamps();
        });

        DB::statement('ALTER TABLE `modules` COMMENT = " This table stores all targets to align with state standards"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modules');
    }
}
