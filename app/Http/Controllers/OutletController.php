<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Outlet;

class OutletController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}


	function view(){
		$dataoutlet = Outlet::all();
		return view('outlet.view', compact('dataoutlet'));
	}

	function create(){
		return view('outlet.create');
	}

	function store(Request $request){
		Outlet::create([
			'name' => $request->name,
			'outlet_code' => $request->outlet_code,
			'addres' => $request->addres,
			'telp' => $request->telp,
			]);
		return redirect('outlet');
	}

	function edit($id){
		$dataoutlet = Outlet::find($id);
		return view('outlet.edit', compact('dataoutlet'));
	}

	function update(Request $request, $id){
		
		$update = Outlet::find($id)->update([
			'name' => $request->name,
			'outlet_code' => $request->outlet_code,
			'addres' => $request->addres,
			'telp' => $request->telp,
			]);
		return redirect('outlet');
	}

	function delete($id){
		Outlet::destroy($id);
		return redirect('outlet');
	}
}
