<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 't_e_photo_pho';
	public $timestamps = false;
	public $primaryKey = 'pho_id'; //Nom de la primary key
}
