@extends('layouts.app')
@section('content')
<a href="{{ url('user') }}" class="setting-icon">
	<span class="glyphicon glyphicon-circle-arrow-left"></span>
</a>
<div class="text-center">
	<form action="{{ url('user/updateprofile') }}" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<script type="text/javascript">
			function readURL(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();
					reader.onload = function (e) {
						$('#blah').attr('src', e.target.result);
					}
					reader.readAsDataURL(input.files[0]);
				}
			}
		</script>

		<div class="circle" style="height: 100px; width: 100px; overflow: hidden; margin: auto;">
			<img class="responsive-img" id="blah" src="{{ asset($picture) }}" alt=""/>
		</div>
		<input class="inputfile" type="file" id="img" onchange="readURL(this);" name="photo">
		<label class="labelImg" for="img">Upload Photo</label>
	</div>
	<br>
	<div class="divider"></div>
	<br>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<label for="">Nama</label>
			<input type="text" class="form-control" value="{{ $user->name }}" name="name">
		</div>
		<div class="col-md-4 col-md-offset-4">
			<label for="">Email</label>
			<input type="email" class="form-control" value="{{ $user->email }}" name="email">
		</div>
		<div class="col-md-4 col-md-offset-4 center">
			<br>
			<button type="submit" class="btn btn-default center">SIMPAN</button>
		</div>
	</div>
</form>

<style>
	/*styling input:file*/
	.inputfile {
		width: 0.1px;
		height: 0.1px;
		opacity: 0;
		overflow: hidden;
		position: absolute;
		z-index: -1;
	}
	/*styling inputfile label*/
	.labelImg{
		right: 0.75rem;
	}
	.inputfile + label {
		cursor: pointer;
		margin: auto;
		margin-top: 15px; /* "hand" cursor */
	}
	.setting-icon{
		position: absolute;
	}
	/*.previewfoto{
		border: 1px solid #B71C1C;
		margin: 0 auto;
		border-radius: 2px;
		margin-top: 53px;
		width: 120px;
		height: 173px;
		overflow: hidden;
	}*/
</style>
@endsection