<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\ProductRetur;
use App\Product;
use App\ProductReturDetail;
use App\ProductOutDetail;
use App\ProductCrash;

class ProductReturDetailController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}

	function create($number){

		$datadetail = ProductRetur::where('number', $number)->first();
		$dataproduct = ProductOutDetail::select('product_id', DB::raw('COUNT(product_id) as count'))->groupBy('product_id')->get();
		// dd($dataproduct);
		if($datadetail->status == 'open'){
			$dtstatus = '';
		}else{
			$dtstatus = 'disabled';
			// $dtstatus = '';
		}
		return view('transaction.transaction_retur.transactionReturDetail', compact('datadetail', 'dtstatus', 'dataproduct'));
	}

	function getdata($number){
		$data = ProductReturDetail::where('number', $number)->with('product')->get();
		return $data;
	}

	function edit($id){
		$data = ProductReturDetail::find($id);
		return $data;
	}

	function add(Request $request){
		ProductReturDetail::updateOrCreate(
			['number' => $request->number, 'product_id' => $request->product_id],
			['quantity' => $request->quantity]
			);
		return $request->number;
	}

	function delete($id){
		ProductReturDetail::destroy($id);
	}

	function simpan($number){
		// ProductRetur::where('number', $number)->update([
		// 	'status' => 'closed'
		// 	]);
		$data = ProductReturDetail::where('number', $number)->get();
		// $dataa = [];
		foreach ($data as $key) {
			$dtproduct = ProductCrash::where('Product_id', $key->product_id)->first();
			if ($dtproduct == null) {
				ProductCrash::create([
					'product_id' => $key->product_id,
					'quantity' => $key->quantity,
					]);
			}else{
				$dtproduct->update([
					'quantity' => $dtproduct->quantity + $key->quantity,
					]);
			}
			// $dtproduct->update([
			// 	'stock' => $dtproduct->stock + $key->quantity,
			// 	]);

		}
		return redirect('barangrusak');
	}
}
