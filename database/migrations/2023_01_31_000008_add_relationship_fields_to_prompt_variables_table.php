<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPromptVariablesTable extends Migration
{
    public function up()
    {
        Schema::table('prompt_variables', function (Blueprint $table) {
            $table->unsignedBigInteger('prompt_id')->nullable();
            $table->foreign('prompt_id', 'prompt_fk_7955959')->references('id')->on('prompts');
        });
    }
}
