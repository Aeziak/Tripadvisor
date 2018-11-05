<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicesHotel extends Model
{
    protected $table = 't_j_servicehotel_srh';
	public $timestamps = false;
	public $primaryKey = 'hot_id'; //Nom de la primary key
}
