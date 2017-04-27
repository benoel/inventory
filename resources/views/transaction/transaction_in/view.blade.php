@extends('layouts.app')

@section('content')
<a href="{{ url('barangmasuk/create') }}" class="btn roman white-txt">Buat Transaksi Barang Masuk</a>

<table id="inventoryTable" class="display">
	<thead>
		<tr>
			<th>#</th>
			<th>Nomor Transaksi</th>
			<th>Supplier</th>
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
			<td>{{ $element->supplier->name }}</td>
			<td>{{ $element->status }}</td>
			<td>{{ $element->note }}</td>
			<td class="center">
				<a class="roman-txt" href="{{ url('transaksi-in/'. $element->number) }}"><span class="glyphicon glyphicon-sort"></span> Lihat</a>
				@if ($element->status == 'open')
				|| <a class="roman-txt" href="{{ url('transaksi-in/'. $element->number.'/delete') }}"><span class="glyphicon glyphicon-trash"></span> Hapus</a>
				@endif
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
