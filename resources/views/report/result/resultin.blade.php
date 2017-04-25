@extends('layouts.app')
@section('content')
<h1 class="text-center">Laporan Barang Masuk</h1>
<p style="color: #F4645F; font-weight: bold;" class="text-center">Laporan Penjualan dari tgl {{ $from }} sampai tgl {{ $to }}</p>
<div class="row">
	<table class="table">
		<thead>
			<tr>
				<th>Nomor</th>
				<th>Nomor Transaksi</th>
				<th>Supplier</th>
				<th>Barang</th>
				<th>Qty</th>
			</tr>
		</thead>


		<tbody>
			@php ($i = 0)
			@foreach ($datareport as $a)
			@foreach ($a->productindetails as $element)
			@php ($i++)
			<tr>
				<td>{{ $i }}</td>
				<td>{{ $element->number }}</td>
				<td>{{ $a->supplier->name }}</td>
				<td>{{ $element->product->name }}</td>
				<td>{{ $element->quantity }}</td>
			</tr>
			@endforeach
			@endforeach
		</tbody>
	</table>
	<div class="text-center">
		<button id="kembali" class="btn btn-default">KEMBALI</button>
	</div>
	
</div>
<style>
	
</style>

<script type="text/javascript">

	$(document).ready(function() {
		$('#kembali').click(function(event) {
			/* Act on the event */
			window.history.back();
		});
	});
</script>
@endsection