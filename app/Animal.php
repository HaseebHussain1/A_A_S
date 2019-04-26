<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
	public function adoptions(){

		return $this->hasMany('App\Adoption','petid');//
//->where('status','=','pending');
}

public function succsesfuladoption(){

	$adoptions=$this->adoptions();
	$adoption=$adoptions->where('status','=','accepted');
		return $adoption;
}

	
}
