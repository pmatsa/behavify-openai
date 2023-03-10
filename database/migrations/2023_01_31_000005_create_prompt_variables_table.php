<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromptVariablesTable extends Migration
{
    public function up()
    {
        Schema::create('prompt_variables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('key');
            $table->string('value');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
