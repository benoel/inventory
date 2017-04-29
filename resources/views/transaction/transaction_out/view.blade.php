@extends('layouts.app')

@section('content')
<a href="{{ url('barangkeluar/create') }}" class="btn roman white-txt">Buat Transaksi Barang Keluar</a>
<div class="table">
	<div class="loader center">
		<img width="40" src="{{ asset('images/cube.gif') }}" alt="">
		<p>Please Waiting..</p>
	</div>
	<table class="dttable display">
		<thead>
			<tr>
				<th>#</th>
				<th>Nomor Transaksi</th>
				<th>Outlet</th>
				<th>Status</th>
				<th>Note</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			@php
			$no = 1;
			@endphp
			@foreach ($data as $element)
			<tr>
				<td>{{ $no++ }}</td>
				<td>{{ $element->number }}</td>
				<td>{{ $element->outlet->name }}</td>
				<td>{{ $element->status }}</td>
				<td>{{ $element->note }}</td>
				<td>
					<a class="roman-txt" href="{{ url('transaksi-out/'. $element->number) }}"><span class="glyphicon glyphicon-sort"></span> Lihat</a>
					@if ($element->status == 'open')
					|| <a class="roman-txt" href="{{ url('transaksi-out/'. $element->number.'/delete') }}"><span class="glyphicon glyphicon-trash"></span> Hapus</a>
					@endif
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
<style>
	.btn{
		margin-bottom: 30px;
	}
</style>

<script>
	$(document).ready(function () {
		$('#inventoryTable').DataTable();
	});
</script>
@endsection
