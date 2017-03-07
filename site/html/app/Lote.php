<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    protected $table = 'lote';
    protected $dates = ['realizado_em','created_at', 'updated_at'];
}
