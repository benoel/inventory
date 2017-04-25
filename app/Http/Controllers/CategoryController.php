<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}


	function view(){
		$datacategory = Category::all();
		return view('category.view', compact('datacategory'));
	}

	function create(){
		return view('category.create');
	}

	function store(Request $request){
		Category::create([
			'name' => $request->name,
			]);
		return redirect('kategori');
	}

	function edit($id){
		$datacategory = Category::find($id);
		return view('category.edit', compact('datacategory'));
	}

	function update(Request $request, $id){
		
		$update = Category::find($id)->update([
			'name' => $request->name,
			]);
		return redirect('kategori');
	}

	function delete($id){
		Category::destroy($id);
		return redirect('kategori');
	}
}
