@extends('layouts.app')

@section('content')
<h1 class="">Tambah Outlet</h1>
<div class="row">
	<div class="col-md-6{{--  col-md-offset-3 --}}">
		<form action="{{ url('outlet') }}" method="POST">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="1">Kode Outlet</label>
				<input name="outlet_code" type="text" class="form-control" id="inputBarcode" placeholder="Kode Outlet">
			</div>
			<div class="form-group">
				<label for="1">Nama Outlet</label>
				<input name="name" type="text" class="form-control" id="1" placeholder="Nama Outlet">
			</div>
			<div class="form-group">
				<label for="3">Alamat</label>
				<textarea class="form-control" name="addres" id="" cols="30" rows="7"></textarea>
			</div>
			<div class="form-group">
				<label for="3">Telp</label>
				<input name="telp" type="text" class="form-control" id="3" placeholder="Telp">
			</div>
			<br>
			<button type="submit" class="btn btn-primary">SIMPAN</button>
		</form>
	</div>
</div>

<script>
	$(document).ready(function () {

	});
</script>
@endsection
