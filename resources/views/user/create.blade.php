@extends('layouts.app')
@section('content')
<h1 class="center">Tambah User</h1>
<div class="row">
	<form action="{{ route('register') }}" method="POST">
		{{ csrf_field() }}

		<div class="col-md-4 col-md-offset-4">
			<label for="">Username</label>
			<input type="text" class="form-control" name="username" value="{{ old('username' )}}">
			@if ($errors->has('username'))
			<span class="help-block">
				<strong>{{ $errors->first('username') }}</strong>
			</span>
			@endif
		</div>
		<div class="col-md-4 col-md-offset-4">
			<label for="">Nama</label>
			<input type="text" class="form-control" name="name" value="{{ old('name' )}}">
			@if ($errors->has('name'))
			<span class="help-block">
				<strong>{{ $errors->first('name') }}</strong>
			</span>
			@endif
		</div>
		<div class="col-md-4 col-md-offset-4">
			<label for="">Email</label>
			<input type="email" class="form-control" name="email" value="{{ old('email' )}}">
			@if ($errors->has('email'))
			<span class="help-block">
				<strong>{{ $errors->first('email') }}</strong>
			</span>
			@endif
		</div>
		<div class="col-md-4 col-md-offset-4">
			<label for="">Password</label>
			<input type="password" class="form-control" name="password">
			@if ($errors->has('password'))
			<span class="help-block">
				<strong>{{ $errors->first('password') }}</strong>
			</span>
			@endif
		</div>
		<div class="col-md-4 col-md-offset-4">
			<label for="">Konfirmasi Password</label>
			<input type="password" class="form-control" name="password_confirmation">
		</div>
		<div class="col-md-4 col-md-offset-4 center">
			<br>
			<button type="submit" class="btn roman white-txt center">SIMPAN</button>
		</div>
	</div>
</form>

<style>

</style>
@endsection