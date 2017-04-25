<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductReturDetail extends Model
{
	protected $guarded = [];
	
	public function productretur()
	{
		return $this->belongsTo('App\ProductRetur', 'number');
	}
	public function product()
	{
		return $this->belongsTo('App\Product');
	}
}
