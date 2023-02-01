<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromptsTable extends Migration
{
    public function up()
    {
        Schema::create('prompts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('prompt_request');
            $table->string('title');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
