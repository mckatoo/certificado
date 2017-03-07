<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipoUser extends Model
{
    protected $table = 'tipoUser';
    protected $dates = ['created_at', 'updated_at'];
}
