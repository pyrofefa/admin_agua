<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'folios';
	protected $fillable = ['numero', 'nombre', 'apellidos', 'direccion','email','password', 'numero'];
}
