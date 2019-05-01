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
	$table->enum('type',['cat', 'dog','bear','lion','mouse','snake']);
	$table->text('description');
	$table->boolean('isadopted');
        $table->timestamps();
	$table->string('image', 256)->nullable(); 
	$table->date('dob'); 
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
