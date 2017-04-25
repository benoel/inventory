@extends('layouts.app')

@section('content')
<h1 class="center">Barang Rusak</h1>
<table id="inventoryTable" class="display">
	<thead>
		<tr>
			<th>#</th>
			<th>Nama Barang</th>
			<th>Qty</th>
		</tr>
	</thead>
	<tbody>
		@php
		$no = 1;
		@endphp
		@foreach ($dataproductcrash as $data)
		<tr>
			<td>{{ $no++ }}</td>
			<td>{{ $data->product->name }}</td>
			<td>{{ $data->quantity }}</td>
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
