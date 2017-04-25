<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductOut extends Model
{
	protected $guarded = [];
	
	public function outlet()
	{
		return $this->belongsTo('App\Outlet');
	}

	public function productoutdetails()
	{
		return $this->hasMany('App\ProductOutDetail','number', 'number');
	}
}
