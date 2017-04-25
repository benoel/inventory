<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductRetur extends Model
{
	protected $guarded = [];
	
	public function outlet()
	{
		return $this->belongsTo('App\Outlet');
	}

	public function productreturdetails()
	{
		return $this->hasMany('App\ProductReturDetail','number', 'number');
	}
}
