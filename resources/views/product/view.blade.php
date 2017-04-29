@extends('layouts.app')

@section('content')
<a href="{{ url('barang/create') }}" class="btn roman white-txt">Tambah Barang</a>
<div class="table">
	<div class="loader center">
		<img width="40" src="{{ asset('images/cube.gif') }}" alt="">
		<p>Please Waiting..</p>
	</div>
	<table class="dttable display">
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
					<a class="roman-txt" href="{{ url('barang/'. $data->id .'/edit') }}"><span class="glyphicon glyphicon-pencil"></span> Edit</a> || 
					<a class="roman-txt" href="{{ url('barang/'. $data->id .'/delete') }}"><span class="glyphicon glyphicon-trash"></span> Delete</a>
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
	
</script>
@endsection
