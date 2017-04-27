@extends('layouts.app')
@section('content')
<div class="text-center">
	<a href="{{ url('user/profile') }}" class="left">
		<span class="glyphicon glyphicon-cog"></span>
	</a>
	<div class="circle" style="height: 100px; width: 100px; overflow: hidden; margin: auto;">
		<img src="{{ asset($picture) }}" class="responsive-img" alt="">
	</div>
	<h1>Selamat {{ $feel }}, {{ $nama }}</h1>
	<a class="roman-txt" href="{{ url('user/create') }}"><span class="glyphicon glyphicon-plus"></span> Tambah User Baru</a>
</div>
<br><br>
<table class="table">
	<tr>
		<th>No.</th>
		<th>Nama</th>
		<th>Email</th>
	</tr>
	<tbody>
		@php($i = 0)
		@foreach ($data as $e)
		@php ($i++)
		<tr>
			<td>{{ $i }}</td>
			<td>{{ $e->name }}</td>
			<td>{{ $e->email }}</td>
		</tr>
		@endforeach
	</tbody>
</table>

<style>
	.menu-profile{
		list-style: none;
	}
	.menu-profile li{
		display: inline-block;
		margin: 15px;
	}
</style>
@endsection