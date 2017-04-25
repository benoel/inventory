@extends('layouts.app')

@section('content')
<h1 class="">Edit Unit</h1>
<div class="row">
	<div class="col-md-6{{--  col-md-offset-3 --}}">
		<form action="{{ url('unit/'. $dataunit->id .'') }}" method="POST">
			{{ csrf_field() }}
			<input type="hidden" name="_method" value="PUT">
			<div class="form-group">
				<label for="1">Nama Unit</label>
				<input name="name" type="text" class="form-control" id="inputBarcode" placeholder="Nama Unit" value="{{ $dataunit->name }}">
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
