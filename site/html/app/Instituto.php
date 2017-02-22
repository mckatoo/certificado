<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instituto extends Model
{
    protected $table = 'instituto';

    /**
    * Relacionamentos
    */

    public function diretor()
    {
    	return $this->belongsTo('App\Professor','diretor');
    }
}
