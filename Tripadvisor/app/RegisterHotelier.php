<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegisterHotelier extends Model
{
    protected $table = 't_e_hotelier_htr';
    public $timestamps = false;
	public $primaryKey = 'htr_id'; //Nom de la primary key
}
