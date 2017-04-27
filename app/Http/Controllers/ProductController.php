<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Unit;

class ProductController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}


	function view(){
		$dataproduct = Product::all();
		$tree = '<span class="glyphicon glyphicon-menu-right"></span> Master <span class="glyphicon glyphicon-menu-right"></span> Barang';
		return view('product.view', compact('dataproduct', 'tree'));
	}

	function create(){
		$category = Category::all();
		$unit = Unit::all();
		$tree = '<span class="glyphicon glyphicon-menu-right"></span> Master <span class="glyphicon glyphicon-menu-right"></span> Barang <span class="glyphicon glyphicon-menu-right"></span> Tambah Barang';
		return view('product.create', compact('category', 'unit', 'tree'));
	}

	function store(Request $request){
		Product::create([
			'name' => $request->name,
			'code' => $request->code,
			'category_id' => $request->category_id,
			'unit_id' => $request->unit_id,
			'stock' => $request->stock,
			]);
		return redirect('barang');
	}

	function edit($id){
		$data = Product::find($id);
		$category = Category::all();
		$unit = Unit::all();
		$tree = '<span class="glyphicon glyphicon-menu-right"></span> Master <span class="glyphicon glyphicon-menu-right"></span> Barang <span class="glyphicon glyphicon-menu-right"></span> Edit Barang';
		return view('product.edit', compact('data', 'unit', 'category', 'tree'));
	}

	function update(Request $request, $id){
		
		$update = Product::find($id)->update([
			'name' => $request->name,
			'code' => $request->code,
			'category_id' => $request->category_id,
			'unit_id' => $request->unit_id,
			'stock' => $request->stock,
			]);
		return redirect('barang');
	}

	function delete($id){
		Product::destroy($id);
		return redirect('barang');
	}

	function getproduct(){
		$dataproduct = Product::all();
		return $dataproduct;
	}

}
