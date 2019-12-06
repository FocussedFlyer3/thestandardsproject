<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModuleStandardizedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_standardized', function (Blueprint $table) {
            $table->biginteger('module_id')->unsigned();
            $table->foreign('module_id')->references('id')->on('modules');
            $table->biginteger('standardized_id')->unsigned();
            $table->foreign('standardized_id')->references('id')->on('standardized')->onDelete('cascade');
            $table->unique(['module_id', 'standardized_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('module_standardized');
    }
}
