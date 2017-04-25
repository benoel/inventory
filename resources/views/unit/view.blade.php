@extends('layouts.app')

@section('content')
<a href="{{ url('unit/create') }}" class="btn btn-default">Tambah Unit</a>

<table id="inventoryTable" class="display">
	<thead>
		<tr>
			<th>#</th>
			<th>Nama Unit/Satuan</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		@php
		$no = 1;
		@endphp
		@foreach ($dataunit as $data)
		<tr>
			<td>{{ $no++ }}</td>
			<td>{{ $data->name }}</td>
			<td>
				<a class="mycolor" href="{{ url('unit/'. $data->id .'/edit') }}">Edit</a> || 
				<a class="mycolor" href="{{ url('unit/'. $data->id .'/delete') }}">Delete</a>
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
