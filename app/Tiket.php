<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    protected $table = 'tikets';
	protected $fillable = ['id_sucursal','fk_caja', 'turno', 'estado', 'tiempo', 'asunto', 'subasunto'];

	public function scopeSearch($query, $name)
	{
		return $query->where('turno','LIKE',"%$name%")
					->orWhere('created_at','LIKE','%$name%"');
	}
}
