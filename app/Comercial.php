<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comercial extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'comerciales';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['ruta', 'tipo', 'duracion'];
}
