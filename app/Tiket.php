<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    protected $table = 'tikets';
	protected $fillable = ['id_sucursal','fk_caja', 'turno', 'estado', 'llegada', 'atendido', 'tiempo', 'asunto', 'subasunto'];

	public function scopeSearch($query, $asunto)
	{
		return $query->where('asunto','LIKE',"%$asunto%");
	}
}