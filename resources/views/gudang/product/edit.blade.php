<!DOCTYPE html>
<html lang="en">

<head>
  @include('templates.head')
  <title>Edit Barang</title>
  <style type="text/css">
  	section img{
  		width: 30%;
  		padding-bottom: 10px;
  	}
  </style>

</head>

<body>
  	<div class="d-flex" id="wrapper">
		<!-- Sidebar -->
		@include('templates.sidebar')
		<!-- /#sidebar-wrapper -->

		<!-- Page Content -->
		<div id="page-content-wrapper">
			@include('templates.header')

			<!-- Main content -->
	      	<section class="content mt-2">
	        	<div class="container-fluid">
          			<div class="box">
            			<div class="box-header">
			              <h5 class="box-title">Edit data barang</h5>
			            </div>
			            <div class="box-body">
			            	@include('gudang/validation')
			            	{!! Form::model($products,['route'=>['product.update',$products->id_produk],'method'=>'PUT', 'enctype'=>'multipart/form-data']) !!}

			            	<div class="row">
		            			<div class="col-md-6 pl-3 pr-3">
				            		<div class="form-group">
										<label>Kode Barang</label>
										<input class="form-control" type="text" name="kode_produk" value="{{ $products->kode_produk }}">
									</div>
									<div class="form-group">
										<label>Nama Barang</label>
										<input class="form-control" type="text" name="nama_produk" value="{{ $products->nama_produk }}">
									</div>
									<br>
									<div class="form-group">
										<label>Barcode</label>
										<input class="form-control" type="text" name="barcode" value="{{ $products->Barcode }}">
									</div>
									<br>
									<div class="form-group">
										<label>Foto Barang</label><br>
										<img src="{{asset('image/'.$products->image)}}" alt="gambar">
										<input type="file" name="image" value="{{ $products->image }}" class="form-control">
									</div>
		            			</div>
		            			<div class="col-md-6 pl-3 pr-3">
									<div class="form-group">
										<label>Stok Barang</label>
										<input class="form-control" type="number" name="stok_produk" value="{{ $products->stok_produk }}">
									</div><br>
									<div class="form-group">
										<label>Harga Barang</label>
										<input class="form-control" type="number"  name="harga"  value="{{$products->Harga}}">
									</div><br>
									<div class="form-group">
										<label>Item/pak</label>
										<input class="form-control" type="number"  name="item_pak"  value="{{$products->pcs_pak}}">
									</div><br>
									<div class="form-group">
										<label>Satuan Barang</label>
										{{ Form::select('id_unit', \App\Unit::pluck('nama_unit', 'id_unit'), NULL, ['class'=>'form-control']) }}
									</div>
								
									<div class="form-group">
										<input class="btn btn-primary btn-sm" type="submit" name="submit" value="Simpan">
										<input type="reset" class="btn btn-danger btn-sm" value="Reset">
										{{csrf_field()}}
										<input type="hidden" name="_method" value="PUT">
									</div>	
		            			</div>
		            		</div>
			            </div>
        			</div>
	        	</div>
	        </section>
		</div>
		<!-- /.content-wrapper -->
	</div>
	
	@include('templates.scripts')
</body>
</html>
