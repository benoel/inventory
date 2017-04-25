<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductInDetail extends Model
{
	protected $guarded = [];
	
	public function productin()
	{
		return $this->belongsTo('App\ProductIn', 'number', 'number');
	}
	
	public function product()
	{
		return $this->belongsTo('App\Product');
	}
}
