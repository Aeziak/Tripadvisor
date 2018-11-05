<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favoris extends Model
{
    protected $table = 't_j_favori_fav';
	public $timestamps = false;
	public $primaryKey = 'abo_id'; //Nom de la primary key
}
