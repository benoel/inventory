@extends('layouts.app')

@section('content')
<a href="{{ url('kategori/create') }}" class="btn roman white-txt">Tambah Kategori</a>
<div class="table">
	<div class="loader center">
		<img width="40" src="{{ asset('images/cube.gif') }}" alt="">
		<p>Please Waiting..</p>
	</div>
	<table class="dttable display">
		<thead>
			<tr>
				<th>#</th>
				<th>Nama Kategori</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			@php
			$no = 1;
			@endphp
			@foreach ($datacategory as $data)
			<tr>
				<td>{{ $no++ }}</td>
				<td>{{ $data->name }}</td>
				<td>
					<a class="roman-txt" href="{{ url('kategori/'. $data->id .'/edit') }}"><span class="glyphicon glyphicon-pencil"></span> Edit</a> || 
					<a class="roman-txt" href="{{ url('kategori/'. $data->id .'/delete') }}"><span class="glyphicon glyphicon-trash"></span> Delete</a>
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
