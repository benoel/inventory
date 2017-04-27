<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unit;

class UnitController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}


	function view(){
		$dataunit = Unit::all();
		$tree = '<span class="glyphicon glyphicon-menu-right"></span> Master <span class="glyphicon glyphicon-menu-right"></span> Unit';
		return view('unit.view', compact('dataunit', 'tree'));
	}

	function create(){
		$tree = '<span class="glyphicon glyphicon-menu-right"></span> Master <span class="glyphicon glyphicon-menu-right"></span> Unit <span class="glyphicon glyphicon-menu-right"></span> Buat Unit';
		return view('unit.create', 'tree');
	}

	function store(Request $request){
		Unit::create([
			'name' => $request->name,
			]);
		return redirect('unit');
	}

	function edit($id){
		$dataunit = Unit::find($id);
		$tree = '<span class="glyphicon glyphicon-menu-right"></span> Master <span class="glyphicon glyphicon-menu-right"></span> Unit <span class="glyphicon glyphicon-menu-right"></span> Edit Unit';
		return view('unit.edit', compact('dataunit', 'tree'));
	}

	function update(Request $request, $id){
		
		$update = Unit::find($id)->update([
			'name' => $request->name,
			]);
		return redirect('unit');
	}

	function delete($id){
		Unit::destroy($id);
		return redirect('unit');
	}
}
