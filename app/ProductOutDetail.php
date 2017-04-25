<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductOutDetail extends Model
{
	protected $guarded = [];
	
	public function productout()
	{
		return $this->belongsTo('App\ProductOut', 'number');
	}
	public function product()
	{
		return $this->belongsTo('App\Product');
	}
}
