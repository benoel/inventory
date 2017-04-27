@extends('layouts.app')
@section('content')
<h1 class="center">Ganti Password</h1>
<div class="row">
	<form action="{{ url('user/changepassword') }}" method="POST">
		{{ csrf_field() }}
		<div class="col-md-4 col-md-offset-4">
			<label for="">Password Baru</label>
			<input type="password" class="form-control" name="new_password">
		</div>
		<div class="col-md-4 col-md-offset-4">
			<label for="">Konfirmasi Password</label>
			<input type="password" class="form-control" name="new_password_confirmation">
		</div>
		<div class="col-md-4 col-md-offset-4">
			<label for="">Password Lama</label>
			<input type="password" class="form-control" name="oldpass">
		</div>
		<div class="col-md-4 col-md-offset-4 center">
			<br>
			<button type="password" class="btn roman white-txt center">SIMPAN</button>
		</div>
	</div>
</form>	


<style>

</style>
@endsection