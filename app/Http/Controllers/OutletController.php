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
		$tree = '<span class="glyphicon glyphicon-menu-right"></span> Master <span class="glyphicon glyphicon-menu-right"></span> Outlet';
		return view('outlet.view', compact('dataoutlet', 'tree'));
	}

	function create(){
		$tree = '<span class="glyphicon glyphicon-menu-right"></span> Master <span class="glyphicon glyphicon-menu-right"></span> Outlet <span class="glyphicon glyphicon-menu-right"></span> Buat Outlet';
		return view('outlet.create', compact('tree'));
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
		$tree = '<span class="glyphicon glyphicon-menu-right"></span> Master <span class="glyphicon glyphicon-menu-right"></span> Outlet <span class="glyphicon glyphicon-menu-right"></span> Edit Outlet';
		return view('outlet.edit', compact('dataoutlet', 'tree'));
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
