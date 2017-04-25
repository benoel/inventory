<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductIn extends Model
{
	protected $guarded = [];
	
	public function supplier()
	{
		return $this->belongsTo('App\Supplier');
	}

	public function productindetails()
	{
		return $this->hasMany('App\ProductInDetail', 'number', 'number');
	}
}
