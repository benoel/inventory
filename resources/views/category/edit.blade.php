@extends('layouts.app')

@section('content')
<h1 class="">Edit Kategori</h1>
<div class="row">
	<div class="col-md-6{{--  col-md-offset-3 --}}">
		<form action="{{ url('kategori/'. $datacategory->id .'') }}" method="POST">
			{{ csrf_field() }}
			<input type="hidden" name="_method" value="PUT">
			<div class="form-group">
				<label for="1">Nama Kategori</label>
				<input name="name" type="text" class="form-control" id="inputBarcode" placeholder="Nama Kategori" value="{{ $datacategory->name }}">
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
