<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Folios extends Model
{
	protected $table = 'folios';
	protected $fillable = ['numero', 'tipo', 'id_sucursal'];
}