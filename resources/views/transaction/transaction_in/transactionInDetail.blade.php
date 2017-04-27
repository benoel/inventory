@extends('layouts.app')

@section('content')
@if ($dtstatus == 'disabled')
<div class="alert alert-danger" role="alert">
	<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
	<span class="sr-only">Note:</span>
	Transaksi Ini Sudah Selesai!
</div>
@endif
<div class="row" ng-app="barangdetail" ng-controller="inController">
	<div ng-init="init('{{ $datadetail->number }}')"></div>
	<div class="col-md-8">
		<div id="tablePurchase" class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr class="center">
						<th style="width:45px">#</th>
						<th>Nama Barang</th>
						<th style="width:65px">Qty</th>
						<th class="{{$dtstatus=='disabled'? 'hidden' : ''}}" style="width:100px">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<div>
						<tr ng-repeat='dt in dataIn'>
							<td>#</td>
							<td>[ dt.product.name ]</td>
							<td>[ dt.quantity ]</td>
							<td {{$dtstatus=='disabled'? 'hidden' : ''}}><a href="#" ng-click="deleteProduct([dt.id], '{{$datadetail->number}}')" class="mycolor">Hapus</a> || <a data-toggle="modal" data-target=".bs-example-modal-sm" href="#" ng-click="editProduct([dt.id], '{{$datadetail->number}}')" class="mycolor edit">Edit</a></td>
						</tr>
					</div>
				</tbody>
			</table>
		</div>
	</div>
	<div class="card col-md-4">
		<div class="row">
			<div class="col-md-12">
				<h3 class="">No : {{ $datadetail->number }}</h3>
				<p>Supplier : {{ $datadetail->supplier->name }}</p>
				<p>Tanggal : {{ $datadetail->created_at }}</p>
				<p>Status : {{ $datadetail->status }}</p>
				<p>Catatan : {{ $datadetail->note }}</p>
			</div>
		</div>
		<div class="divider"></div>
		<div class="row">
			{{-- <form id="form"> --}}
			{{-- {{ csrf_field() }} --}}

			<input ng-init="barang.number='{{ $datadetail->number }}'" type="hidden" value="{{ $datadetail->number }}" name="number">
			<div class="col-md-12 form-group">
				<label for="productid">Nama Barang</label>
				<select {{$dtstatus}} ng-model="barang.product_id" class="form-control select2" name="product_id" id="productid">
					<option value="" selected disabled>Nama Barang</option>
					@foreach ($dataproduct as $element)
					<option value="{{$element->id}}" >{{$element->name}}</option>
					@endforeach
				</select>
			</div>
			<div class="col-md-4">
				<label for="qty">Quantity</label>
				<input ng-model="barang.quantity" name="quantity" type="text" class="form-control" id="qty" placeholder="qty" {{$dtstatus}}>
			</div>
			<div class="col-md-8" style="padding-top: 26px;">
				<button id="btn" ng-click="product('add')" id="simpanPembelian" class="btn btn-success btn-block {{$dtstatus=='disabled'? 'hidden' : ''}}">INPUT</button>
			</div>
			{{-- </form> --}}
		</div>
		<div class="row">
			<div class="{{ $dtstatus =='disabled' ? 'hidden' : 'col-md-12'}}">
				<a href="{{ url('transaksimasuk/'. $datadetail->number .'/simpan') }}" class="btn btn-default btn-block" style="margin-top: 15px; color: #636b6f; border-bottom: 5px solid #FDE088;">
					SIMPAN
				</a>
			</div>
			<div class="col-md-12">
				<a href="{{ url('barangmasuk') }}" class="btn btn-default btn-block" style="margin-top: 15px; color: #636b6f; border-bottom: 5px solid #F4645F;">
					KEMBALI
				</a>
			</div>
			<div class="{{ $dtstatus=='disabled' ? 'col-md-12' : 'hidden'}} ">
				<a href="#" id="print" class="btn btn-default btn-block" style="margin-top: 15px; color: #636b6f; border-bottom: 5px solid #5CB85C;">
					{{-- <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>  --}}
					PREVIEW DAN PRINT
				</a>
			</div>
		</div>
		<div class="well" style="margin-top: 20px;">
			* Barang akan otomatis bertambah jika klik "simpan"
		</div>
	</div>

	<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Edit Quantity</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<input type="hidden" ng-init="edit.number='{{ $datadetail->number}}'">
						<input type="hidden" ng-init="edit.product_id='[edit.product_id]'">
						<div class="col-md-12">
							<label for="qty">Quantity</label>
							<input ng-model="edit.quantity" value="[edit.quantity]" name="quantity" type="text" class="form-control" id="qty" placeholder="qty" {{$dtstatus}}>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" ng-click="product('edit')" data-dismiss="modal" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		$('#btn').click(function(){
			$('.select2').val('').trigger('change');
		})

		$('#print').click(function(event) {
			/* Act on the event */
			event.preventDefault();
			popup_print();
		});

		function popup_print(){
			window.open('{{ url("printtransaksimasuk") }}/{{ $datadetail->number }}','page','toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=750,height=600,left=50,top=50,titlebar=yes')
		}
	})
</script>

@endsection