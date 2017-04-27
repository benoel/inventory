<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Supplier;
use App\ProductIn;
use App\ProductInDetail;

class ProductInController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}

	function transaksi_id() {
		// ambil data maximal dari id transaksi
		// $dataMax = mysql_fetch_assoc(mysql_query("SELECT SUBSTR(MAX(no_invoice),-5) AS ID  FROM orders")); 
		$dataMax = ProductIn::select(DB::raw('substr(max(number), -5)'));
		$date = date('ymd');
		$param='IN'.$date;

		if($dataMax->count() <= 0) { 
		// bila data kosong
			$ID = $param.'00001';
		}else {
			$MaksID = $dataMax->count();
			$MaksID++;
			// nilai kurang dari 10
			if($MaksID < 10) $ID = $param."0000".$MaksID; 
                // nilai kurang dari 100
			else if($MaksID < 100) $ID = $param."000".$MaksID;
                // nilai kurang dari 1000
			else if($MaksID < 1000) $ID = $param."00".$MaksID; 
                // nilai kurang dari 10000
			else if($MaksID < 10000) $ID = $param."0".$MaksID; 
                // lebih dari 10000
			else $ID = $MaksID; 
		}
		return $ID;
		// return $dataMax;
	}

	function create(){
		$datasupplier = Supplier::all(); 
		$nomor = $this->transaksi_id();
		$tree = '<span class="glyphicon glyphicon-menu-right"></span> Transaksi <span class="glyphicon glyphicon-menu-right"></span> Buat Transaksi Masuk';
		return view('transaction.transaction_in.transactionin', compact('datasupplier', 'nomor', 'tree'));
	}

	function store(Request $request){
		ProductIn::create([
			'supplier_id' => $request->supplier_id,
			'number' => $request->number,
			'note' => $request->note,
			]);
		return redirect('transaksi-in/'. $request->number .'');
	}

	function view(){
		$data = ProductIn::all();
		$tree = '<span class="glyphicon glyphicon-menu-right"></span> Transaksi <span class="glyphicon glyphicon-menu-right"></span> Transaksi Masuk';
		return view('transaction.transaction_in.view', compact('data', 'tree'));
	}

	function previewtransaksi($number){
		$datadetail = ProductIn::where('number', $number)->get();
		$purchasenumber = $number;
		$databarang = ProductInDetail::where('number', $number)->get();

		return view('transaction.transaction_in.viewdetail', compact('datadetail', 'purchasenumber', 'databarang'));
	}

	function report(Request $request){

		if ($request->from == '' && $request->from == '') {
			$datareport = ProductIn::where('status', 'closed')->with('supplier', 'productindetails')->get();;
			$from = '-';
			$to = '-';
		}else{
			$datareport = ProductIn::where('status', 'closed')->with('supplier', 'productindetails')->whereBetween('created_at', [$request->from.' 00:00:00', $request->to.' 23:59:59'])->get();

			$from = $request->from;
			$to = $request->to;
		}
		// dd($datareport);
		$tree = '<span class="glyphicon glyphicon-menu-right"></span> Laporan <span class="glyphicon glyphicon-menu-right"></span> Barang Masuk <span class="glyphicon glyphicon-menu-right"></span> Result ';
		return view('report.result.resultin', compact('datareport', 'from', 'to', 'tree'));
	}

	function delete($number){
		ProductIn::where('number', $number)->delete();
		ProductInDetail::where('number', $number)->delete();
		return redirect ('barangmasuk');
	}

}






