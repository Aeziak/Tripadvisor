<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FourchettePrix extends Model
{
    protected $table = 't_r_fourchetteprix_prx';
	public $timestamps = false;
	public $primaryKey = 'prx_id'; //Nom de la primary key
}
