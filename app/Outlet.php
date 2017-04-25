<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
	protected $guarded = [];
	
	public function productouts()
	{
		return $this->hasMany('App\ProductOut');
	}

	public function productreturs()
	{
		return $this->hasMany('App\ProductRetur');
	}
}
