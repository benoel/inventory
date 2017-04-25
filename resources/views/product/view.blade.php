@extends('layouts.app')

@section('content')
<a href="{{ url('barang/create') }}" class="btn btn-default">Tambah Barang</a>

<table id="inventoryTable" class="display">
	<thead>
		<tr>
			{{-- <th>Barcode</th> --}}
			<th>Kode Barang</th>
			<th>Nama Barang</th>
			<th>Unit</th>
			<th>Stock</th>
			<th>Kategory</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($dataproduct as $data)
		<tr>
			<td>{{ $data->code }}</td>
			<td>{{ $data->name }}</td>
			<td>{{ $data->unit->name }}</td>
			<td>{{ $data->stock }}</td>
			<td>{{ $data->category->name }}</td>
			<td>
				<a class="mycolor" href="{{ url('barang/'. $data->id .'/edit') }}">Edit</a> || 
				<a class="mycolor" href="{{ url('barang/'. $data->id .'/delete') }}">Delete</a>
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
