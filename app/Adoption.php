<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Adoption extends Model
{

protected $table='adoptions';
    public function user(){

return $this->belongsTo('App\User','userid');

}

public function animal(){

return $this->belongsTo('App\Animal','petid');

}

}
