<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file_name');
            $table->string('title');
            $table->string('description');
            $table->Integer('client_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('client_id')
              ->references('id')->on('clients')
              ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes');
    }
}
