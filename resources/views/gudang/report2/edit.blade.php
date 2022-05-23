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
			            	{!! Form::model($products,['route'=>['report2.update',$products->no_po],'method'=>'PUT', 'enctype'=>'multipart/form-data']) !!}

			            	<div class="row">
		            			<div class="col-md-6 pl-3 pr-3">
				            		<div class="form-group">
										<label>No PO</label>
										<input class="form-control" type="text" name="nopo" value="{{ $products->no_po}}">
									</div>
									<div class="form-group">
										<label>Nama Supplier</label>
										<select class="form-control form-control-sm" name="supplier">
										  <option>- Supplier -</option>
										  
											 @foreach($toko as $tokos)
											   <option value="{{$tokos->kode_toko}}">{{$tokos->nama_toko}}</option>
									   
											 @endforeach
									   
										</select>
									  </div>
									<br>
									<div class="form-group">
										<label>Nama Barang</label>
										<input class="form-control" type="text" name="nama" value="{{ $products->nama_barang }}">
									</div>
									<br>
									<div class="form-group">
										<label>Qty</label>
										<input class="form-control" type="text" name="qty" value="{{ $products->qty }}">
									</div>
									<br>
									<div class="form-group">
										<label>Satuan</label>
										<select class="form-control form-control-sm" name="satuan">
										  <option>{{$products->satuan}}</option>
										  
											 @foreach($units as $unit)
											   <option value="{{$unit->nama_unit}}">{{$unit->nama_unit}}</option>
									   
											 @endforeach
									   
										</select>
									  </div>
									<br>
									<div class="form-group">
										<label>Harga</label>
										<input class="form-control" type="text" name="harga" value="{{ $products->Harga }}">
									</div>
									<br>
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
	        	</div>
	        </section>
		</div>
		<!-- /.content-wrapper -->
	</div>
	
	@include('templates.scripts')
</body>
</html>
