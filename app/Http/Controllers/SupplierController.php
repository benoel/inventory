<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;

class SupplierController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}


	function view(){
		$datasupplier = Supplier::all();
		$tree = '<span class="glyphicon glyphicon-menu-right"></span> Master <span class="glyphicon glyphicon-menu-right"></span> Supplier';
		return view('supplier.view', compact('datasupplier', 'tree'));
	}

	function create(){
		$tree = '<span class="glyphicon glyphicon-menu-right"></span> Master <span class="glyphicon glyphicon-menu-right"></span> Supplier <span class="glyphicon glyphicon-menu-right"></span> Buat Barang';
		return view('supplier.create', compact('tree'));
	}

	function store(Request $request){
		Supplier::create([
			'name' => $request->name,
			'supplier_code' => $request->supplier_code,
			'addres' => $request->addres,
			'telp' => $request->telp,
			]);
		return redirect('supplier');
	}

	function edit($id){
		$datasupplier = Supplier::find($id);
		$tree = '<span class="glyphicon glyphicon-menu-right"></span> Master <span class="glyphicon glyphicon-menu-right"></span> Supplier <span class="glyphicon glyphicon-menu-right"></span> Edit Supplier';
		return view('supplier.edit', compact('datasupplier'));
	}

	function update(Request $request, $id){
		
		$update = Supplier::find($id)->update([
			'name' => $request->name,
			'supplier_code' => $request->supplier_code,
			'addres' => $request->addres,
			'telp' => $request->telp,
			]);
		return redirect('supplier');
	}

	function delete($id){
		Supplier::destroy($id);
		return redirect('supplier');
	}
}
