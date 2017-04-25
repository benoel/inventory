@extends('layouts.app')

@section('content')
<h1 class="">Tambah Barang</h1>
<div class="row">
	<div class="col-md-6{{--  col-md-offset-3 --}}">
		<form action="{{ url('barang') }}" method="POST">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="1">Kode Barang</label>
				<input name="code" type="text" class="form-control" id="inputBarcode" placeholder="Kode Barang">
			</div>
			<div class="form-group">
				<label for="1">Nama Barang</label>
				<input name="name" type="text" class="form-control" id="1" placeholder="Nama Barang">
			</div>
			<div class="form-group">
				<label for="2">Unit</label>
				<select class="form-control" id="2" name="unit_id">
					<option disabled selected></option>
					@foreach ($unit as $element)
					<option value="{{ $element->id }}">{{ $element->name }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="3">Stock</label>
				<input name="stock" type="text" class="form-control" id="3" placeholder="Stock">
			</div>
			<label for="cat">Katagory</label>
			<select class="form-control" id="cat" name="category_id">
				<option disabled selected></option>
				@foreach ($category as $element)
				<option value="{{ $element->id }}">{{ $element->name }}</option>
				@endforeach
			</select>
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
