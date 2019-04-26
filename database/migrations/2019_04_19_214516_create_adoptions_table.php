<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdoptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adoptions', function (Blueprint $table) {
            $table->bigIncrements('id');
	$table->bigInteger('userid')->unsigned();
	$table->bigInteger('petid')->unsigned();
	$table->enum('status',['denide','accepted','pending']);
        $table->timestamps();
	$table->unique(['userid', 'petid']);
	$table->foreign('userid')->references('id')->on('users')->onDelete('cascade');

$table->foreign('petid')->references('id')->on('animals')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adoptions');
    }
}
