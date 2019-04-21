<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
	public function adoptions(){

		return $this->hasMany('App\Adoption')->where('status','=','pending');
}

	
}
