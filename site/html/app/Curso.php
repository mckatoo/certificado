<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'curso';

    /**
    * Relacionamentos
    */

    public function coordenador()
    {
    	return $this->belongsTo('App\Professor','coordenador');
    }
}
