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
		return view('unit.view', compact('dataunit'));
	}

	function create(){
		return view('unit.create');
	}

	function store(Request $request){
		Unit::create([
			'name' => $request->name,
			]);
		return redirect('unit');
	}

	function edit($id){
		$dataunit = Unit::find($id);
		return view('unit.edit', compact('dataunit'));
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
