<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
        $table->bigIncrements('id');
	$table->string('name');
	$table->integer('age');
	$table->enum('type',['car', 'truck']);
	$table->text('description');
	$table->boolean('isadopted');
        $table->timestamps();
	$table->string('image', 256)->nullable(); 
	$table->date('dob')->default('1997-10-07'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animals');
    }
}
