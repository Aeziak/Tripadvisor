<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    protected $table = 't_e_avis_avi';
	public $timestamps = false;
	public $primaryKey = 'avi_id'; //Nom de la primary key
}
