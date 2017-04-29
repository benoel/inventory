@extends('layouts.app')

@section('content')
<h1 class="">Tambah Unit</h1>
<div class="row">
	<div class="col-md-6{{--  col-md-offset-3 --}}">
		<form action="{{ url('unit') }}" method="POST">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="1">Nama Unit</label>
				<input name="name" type="text" class="form-control" id="1" placeholder="Nama Unit">
			</div>
			<br>
			<button type="submit" class="btn roman white-txt">SIMPAN</button>
		</form>
	</div>
</div>

<script>
	$(document).ready(function () {

	});
</script>
@endsection
