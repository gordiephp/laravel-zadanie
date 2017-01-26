<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('notes', function (Blueprint $table) {
            $table->increments('id');
            $table->text('note');
            $table->integer('client_id')->unsigned();
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
