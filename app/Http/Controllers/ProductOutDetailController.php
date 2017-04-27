<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductOut;
use App\Product;
use App\ProductOutDetail;

class ProductOutDetailController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}

	function create($number){

		$datadetail = ProductOut::where('number', $number)->first();
		$dataproduct = Product::all();
		
		if($datadetail->status == 'open'){
			$dtstatus = '';
		}else{
			$dtstatus = 'disabled';
			// $dtstatus = '';
		}
		$tree = '<span class="glyphicon glyphicon-menu-right"></span> Transaksi <span class="glyphicon glyphicon-menu-right"></span> Detail Transaksi Keluar';
		return view('transaction.transaction_out.transactionOutDetail', compact('datadetail', 'dtstatus', 'dataproduct', 'tree'));
	}

	function getdata($number){
		$data = ProductOutDetail::where('number', $number)->with('product')->get();
		return $data;
	}

	function edit($id){
		$data = ProductOutDetail::find($id);
		return $data;
	}

	function add(Request $request){
		ProductOutDetail::updateOrCreate(
			['number' => $request->number, 'product_id' => $request->product_id],
			['quantity' => $request->quantity]
			);
		return $request->number;
	}

	function delete($id){
		ProductOutDetail::destroy($id);
	}

	function simpan($number){
		ProductOut::where('number', $number)->update([
			'status' => 'closed'
			]);
		$data = ProductOutDetail::where('number', $number)->get();
		// $dataa = [];
		foreach ($data as $key) {
			$dtproduct = Product::find($key->product_id);
			$dtproduct->update([
				'stock' => $dtproduct->stock - $key->quantity,
				]);
		}
		return redirect('barangkeluar');
	}
}
