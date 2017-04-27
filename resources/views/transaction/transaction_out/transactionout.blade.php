@extends('layouts.app')

@section('content')
<h1 class="">Transaksi Barang Keluar</h1>
<div class="row">
	<div class="col-md-6{{--  col-md-offset-3 --}}">
		<form action="{{ url('barangkeluar') }}" method="POST">
			{{ csrf_field() }}
			<input type="hidden" name="number" value="{{$nomor}}">
			<div class="form-group">
				<label for="2">Kode Outlet</label>
				<select class="form-control select2" name="outlet_id">
					<option disabled selected></option>
					@foreach ($dataoutlet as $element)
					<option value="{{ $element->id }}">{{ $element->outlet_code }} - {{ $element->name }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="1">Note</label>
				<textarea name="note" class="form-control" id="" cols="30" rows="6"></textarea>
			</div>
			<br>
			<button type="submit" class="btn roman white-txt">KONFIRMASI</button>
		</form>
	</div>
</div>

<script>
	$(document).ready(function () {
		
	});
</script>
@endsection
