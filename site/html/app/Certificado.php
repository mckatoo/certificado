<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificado extends Model
{
	protected $table = 'certificado';

	/**
	*	Relacionamentos
	*/

	public function cursos()
	{
		return $this->belongsTo('App\Curso','curso_id');
	}

	public function lote()
	{
		return $this->belongsTo('App\Lote','lote_id');
	}
}
