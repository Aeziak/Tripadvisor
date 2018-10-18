<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoginHotel extends Model
{
    protected $table = 't_e_abonne_abo';
    public $timestamps = false;
	public $primaryKey = 'abo_id'; //Nom de la primary key
}
