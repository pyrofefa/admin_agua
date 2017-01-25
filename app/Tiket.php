<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    protected $table = 'tikets';
	protected $fillable = ['id_sucursal','fk_caja', 'turno', 'estado', 'tiempo', 'asunto', 'subasunto'];

	public function scopeSearch($query, $asunto)
	{
		return $query->where('asunto','LIKE',"%$asunto%")->orWhere('fk_caja','LIKE',"%$asunto%")->orWhere('created_at','LIKE',"%$asunto%")
			->orWhere('subasunto','LIKE',"%$asunto%");
	}
}
