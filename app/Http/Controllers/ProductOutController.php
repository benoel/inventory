<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\ProductOut;
use App\Outlet;
use App\ProductOutDetail;

class ProductOutController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}

	function transaksi_id() {
		// ambil data maximal dari id transaksi
		// $dataMax = mysql_fetch_assoc(mysql_query("SELECT SUBSTR(MAX(no_invoice),-5) AS ID  FROM orders")); 
		$dataMax = ProductOut::select(DB::raw('substr(max(number), -5)'));
		$date = date('ymd');
		$param='OUT'.$date;

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
		$dataoutlet = Outlet::all(); 
		$nomor = $this->transaksi_id();
		$tree = '<span class="glyphicon glyphicon-menu-right"></span> Transaksi <span class="glyphicon glyphicon-menu-right"></span> Buat Transaksi Keluar';
		return view('transaction.transaction_out.transactionout', compact('dataoutlet', 'nomor', 'tree'));
	}

	function store(Request $request){
		ProductOut::create([
			'outlet_id' => $request->outlet_id,
			'number' => $request->number,
			'note' => $request->note,
			]);
		return redirect('transaksi-out/'. $request->number .'');
	}

	function view(){
		$data = ProductOut::all();
		$tree = '<span class="glyphicon glyphicon-menu-right"></span> Transaksi <span class="glyphicon glyphicon-menu-right"></span> Transaksi Keluar';
		return view('transaction.transaction_out.view', compact('data', 'tree'));
	}

	function previewtransaksi($number){
		$datadetail = ProductOut::where('number', $number)->get();
		$purchasenumber = $number;
		$databarang = ProductOutDetail::where('number', $number)->get();

		return view('transaction.transaction_out.viewdetail', compact('datadetail', 'purchasenumber', 'databarang'));
	}

	function report(Request $request){

		if ($request->from == '' && $request->from == '') {
			$datareport = ProductOut::where('status', 'closed')->with('outlet', 'productoutdetails')->get();;
			$from = '-';
			$to = '-';
		}else{
			$datareport = ProductOut::where('status', 'closed')->with('outlet', 'productoutdetails')->whereBetween('created_at', [$request->from.' 00:00:00', $request->to.' 23:59:59'])->get();

			$from = $request->from;
			$to = $request->to;
		}
		// dd($datareport);
		$tree = '<span class="glyphicon glyphicon-menu-right"></span> Laporan <span class="glyphicon glyphicon-menu-right"></span> Barang Keluar <span class="glyphicon glyphicon-menu-right"></span> Result';
		return view('report.result.resultout', compact('datareport', 'from', 'to'));
	}

	function delete($number){
		ProductOut::where('number', $number)->delete();
		ProductOutDetail::where('number', $number)->delete();
		return redirect ('barangkeluar');
	}
}
