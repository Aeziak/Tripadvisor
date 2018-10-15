<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table = 't_e_hotel_hot';
	public $timestamps = false;
	public $primaryKey = 'hot_id'; //Nom de la primary key
}
