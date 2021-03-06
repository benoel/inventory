@extends('layouts.app')

@section('content')
<a href="{{ url('outlet/create') }}" class="btn roman white-txt">Tambah Otlet</a>
<div class="table">
	<div class="loader center">
		<img width="40" src="{{ asset('images/cube.gif') }}" alt="">
		<p>Please Waiting..</p>
	</div>
	<table class="dttable display">
		<thead>
			<tr>
				{{-- <th>Barcode</th> --}}
				<th>Kode otlet</th>
				<th>Nama otlet</th>
				<th>Alamat</th>
				<th>Telp</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($dataoutlet as $data)
			<tr>
				<td>{{ $data->outlet_code }}</td>
				<td>{{ $data->name }}</td>
				<td>{{ $data->addres }}</td>
				<td>{{ $data->telp }}</td>
				<td>
					<a class="roman-txt" href="{{ url('outlet/'. $data->id .'/edit') }}"><span class="glyphicon glyphicon-pencil"></span> Edit</a> || 
					<a class="roman-txt" href="{{ url('outlet/'. $data->id .'/delete') }}"><span class="glyphicon glyphicon-trash"></span>Delete</a>
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
