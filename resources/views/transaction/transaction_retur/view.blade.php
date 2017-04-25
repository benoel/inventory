@extends('layouts.app')

@section('content')
<a href="{{ url('barangrusak/create') }}" class="btn btn-default">Buat Transaksi Barang Rusak</a>
<a href="{{ url('barangrusak/view') }}" class="btn btn-default">Lihat Barang Rusak</a>

<table id="inventoryTable" class="display">
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
				<a class="mycolor" href="{{ url('transaksi-retur/'. $element->number) }}">Lihat</a>
				{{-- <a class="mycolor" href="{{ url('transaksi-out/'. $element->number.'/delete') }}">Hapus</a> --}}
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

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
