<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $table = 't_r_service_srv';
	public $timestamps = false;
	public $primaryKey = 'srv_id'; //Nom de la primary key
}
