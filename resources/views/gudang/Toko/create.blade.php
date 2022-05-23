<!DOCTYPE html>
<html lang="en">

<head>

  @include('templates.head')
  <title>Tambah Supplier</title>

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
	            			<div class="box-header">
				              <h5 class="box-title">Tambah data supplier</h5>
				            </div>
				            <div class="box-body">
				            	@include('gudang/validation')
				            	@include('gudang/notification')
				            	<form action="{{ url('/toko') }}" method="post">
									<div>
										<label>Kode Supplier</label>
										<input required="" class="form-control" type="text" name="kode">
									</div><br>
									
									<div>
										<label>Nama Supplier</label>
										<input required="" class="form-control" type="text" name="nama">
									</div><br>
									
									<div>
										<label>Alamat</label>
										<textarea class="form-control" type="text" name="alamat" cols="80" rows="3"></textarea>
									</div><br>
									<div>
										<label>Kelurahan</label>
										<textarea class="form-control" type="text" name="kel" cols="80" rows="3"></textarea>
									</div><br>
									<div>
										<label>Kecamatan</label>
										<textarea class="form-control" type="text" name="kec" cols="80" rows="3"></textarea>
									</div><br>
									<div>
										<label>Telepon</label>
										<input required="" class="form-control" type="text" name="telepon">
									</div><br>
									<div>
										<label>Email</label>
										<input required="" class="form-control" type="text" name="email">
									</div><br>
									<div>
										<input class="btn btn-primary" type="submit" name="submit" value="Tambahkan">
										{{csrf_field()}}
										<input type="reset" class="btn btn-danger" value="Reset">
									</div>
				            	</form>
				            </div>
	            		</div>
	        		</div>

	        	</div>
	        </section>
	        <!-- end Main content -->

		</div>
		<!-- /.content-wrapper -->

	</div>
	@include('templates.scripts')
</body>
</html>
