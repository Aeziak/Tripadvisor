<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reponseQuestion extends Model
{
    protected $table = 't_j_reponsequestionhotel_rqh';
    public $timestamps = false;
	public $primaryKey = 'qho_id'; //Nom de la primary key
}
