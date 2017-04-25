<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $guarded = [];
	
	public function category()
	{
		return $this->belongsTo('App\Category');
	}

	public function unit()
	{
		return $this->belongsTo('App\Unit');
	}

	public function productindetails()
	{
		return $this->hasMany('App\ProductInDetail');
	}

	public function productouts()
	{
		return $this->hasMany('App\ProductOutDetail');
	}

	public function productreturdetails()
	{
		return $this->hasMany('App\ProductReturDetail');
	}

	public function productcrashes()
	{
		return $this->hasMany('App\ProductCrash');
	}
}
