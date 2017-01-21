<?php

namespace App;

use Zizaco\Entrust\EntrustRole;
use Illuminate\Database\Eloquent\Model;

class Role extends model
{

	protected $table = 'roles';

	protected $fillable = ['name', 'display_name', 'description'];

	public function user()
    {
        return $this->belongsToMany('App\User');
    }
}
