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
		return view('supplier.view', compact('datasupplier'));
	}

	function create(){
		return view('supplier.create');
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
