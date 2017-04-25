<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\ProductRetur;
use App\Outlet;
use App\ProductReturDetail;
use App\ProductCrash;


class ProductReturController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}

	function transaksi_id() {
		// ambil data maximal dari id transaksi
		// $dataMax = mysql_fetch_assoc(mysql_query("SELECT SUBSTR(MAX(no_invoice),-5) AS ID  FROM orders")); 
		$dataMax = ProductRetur::select(DB::raw('substr(max(number), -5)'));
		$date = date('ymd');
		$param='RTR'.$date;

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
		return view('transaction.transaction_retur.transactionretur', compact('dataoutlet', 'nomor'));
	}

	function store(Request $request){
		ProductRetur::create([
			'outlet_id' => $request->outlet_id,
			'number' => $request->number,
			'note' => $request->note,
			]);
		return redirect('transaksi-retur/'. $request->number .'');
	}

	function index(){
		$data = ProductRetur::all();
		return view('transaction.transaction_retur.view', compact('data'));
	}

	function view(){
		$dataproductcrash = ProductCrash::all();
		return view('product_crash.view', compact('dataproductcrash'));
	}

	function previewtransaksi($number){
		$datadetail = ProductRetur::where('number', $number)->get();
		$purchasenumber = $number;
		$databarang = ProductReturDetail::where('number', $number)->get();

		return view('transaction.transaction_retur.viewdetail', compact('datadetail', 'purchasenumber', 'databarang'));
	}

	function report(Request $request){

		if ($request->from == '' && $request->from == '') {
			$datareport = ProductRetur::where('status', 'closed')->with('outlet', 'productreturdetails')->get();;
			$from = '-';
			$to = '-';
		}else{
			$datareport = ProductRetur::where('status', 'closed')->with('outlet', 'productreturdetails')->whereBetween('created_at', [$request->from.' 00:00:00', $request->to.' 23:59:59'])->get();

			$from = $request->from;
			$to = $request->to;
		}
		// dd($datareport);
		return view('report.result.resultcrash', compact('datareport', 'from', 'to'));
	}
}
