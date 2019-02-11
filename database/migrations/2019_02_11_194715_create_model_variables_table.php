<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelVariablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_variables', function (Blueprint $table) {
            $table->increments('id');
            $table->morphs('model');
            $table->string('index');
            $table->string('value')->nullable();
            $table->unique(['model_id', 'model_type', 'index']);
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
        Schema::dropIfExists('model_variables');
    }
}
