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
		$tree = '<span class="glyphicon glyphicon-menu-right"></span> Master <span class="glyphicon glyphicon-menu-right"></span> Category';
		return view('category.view', compact('datacategory', 'tree'));
	}

	function create(){
		$tree = '<span class="glyphicon glyphicon-menu-right"></span> Master <span class="glyphicon glyphicon-menu-right"></span> Category <span class="glyphicon glyphicon-menu-right"></span> Buat Category';
		return view('category.create', compact('tree'));
	}

	function store(Request $request){
		Category::create([
			'name' => $request->name,
			]);
		return redirect('kategori');
	}

	function edit($id){
		$tree = '<span class="glyphicon glyphicon-menu-right"></span> Master <span class="glyphicon glyphicon-menu-right"></span> Category <span class="glyphicon glyphicon-menu-right"></span> Edit Category';
		$datacategory = Category::find($id);
		return view('category.edit', compact('datacategory', 'tree'));
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
