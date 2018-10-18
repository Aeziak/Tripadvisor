<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionHotel extends Model
{
    protected $table = 't_r_questionhotel_qho';
    public $timestamps = false;
	public $primaryKey = 'qho_id'; //Nom de la primary key
}
