<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldsValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('field_values', function (Blueprint $table) {
            $table->increments('id');
            $table->text('value')->nullable();
            $table->unsignedInteger('field');
            $table->unsignedInteger('record');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('field')->references('id')->on('fields')->onDelete('cascade');
            $table->foreign('record')->references('id')->on('records')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('field_values');
    }
}
