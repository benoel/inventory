<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductIn;
use App\Product;
use App\ProductInDetail;

class ProductInDetailController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}

	function create($number){

		$datadetail = ProductIn::where('number', $number)->first();
		$dataproduct = Product::all();
		
		if($datadetail->status == 'open'){
			$dtstatus = '';
		}else{
			$dtstatus = 'disabled';
			// $dtstatus = '';
		}
		$tree = '<span class="glyphicon glyphicon-menu-right"></span> Transaksi <span class="glyphicon glyphicon-menu-right"></span> Detail Transaksi Masuk';
		return view('transaction.transaction_in.transactionInDetail', compact('datadetail', 'dtstatus', 'dataproduct', 'tree'));
	}

	function getdata($number){
		$data = ProductInDetail::where('number', $number)->with('product')->get();
		return $data;
	}

	function edit($id){
		$data = ProductInDetail::find($id);
		return $data;
	}

	function add(Request $request){
		ProductInDetail::updateOrCreate(
			['number' => $request->number, 'product_id' => $request->product_id],
			['quantity' => $request->quantity]
			);
		return $request->number;
	}

	function delete($id){
		ProductInDetail::destroy($id);
	}

	function simpan($number){
		ProductIn::where('number', $number)->update([
			'status' => 'closed'
			]);
		$data = ProductInDetail::where('number', $number)->get();
		// $dataa = [];
		foreach ($data as $key) {
			$dtproduct = Product::find($key->product_id);
			$dtproduct->update([
				'stock' => $dtproduct->stock + $key->quantity,
				]);
		}
		return redirect('barangmasuk');
	}
}









