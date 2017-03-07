<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificado extends Model
{
	protected $table = 'certificado';
	protected $dates = ['realizado_em', 'created_at', 'updated_at'];

	/**
	*	Relacionamentos
	*/

	public function cursos()
	{
		return $this->belongsTo('App\Curso','curso_id');
	}

	public function instituto()
	{
		return $this->belongsTo('App\Instituto','instituto_id');
	}

	public function lote()
	{
		return $this->belongsTo('App\Lote','lote_id');
	}
}
