<!DOCTYPE html>
<html lang="en">
<head>
  @include('templates.head')
  <title>Surat Jalan</title>
  <style type="text/css">
    .bawah{
      min-height: 300px
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

      <!-- Content Header (Page header) -->
      <section class="content mt-2">
        <div class="container-fluid">
          <h3>Buat Surat Jalan</h3>
          <hr>
        </div>
      </section>

      <!-- Main content -->
      <section class="content mt-2">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-4 pl-3 pr-3">
                @include('gudang/validation')
                <div>
                  <a href="{{ route('purchase.show') }}"> <button class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-plus"></i> Liat Surat Jalan</button></a>
                </div><br>
                <form action="{{ route('purchase.store') }}" method="post">
                  <div class="form-group">
                    <label>No Po</label>
                    <input class="form-control" type="text" name="no_po">
                  </div>
                  <div class="form-group">
                    <label>Tanggal</label>
                    <input required="" class="form-control form-control-sm" type="date" name="tanggal">
                  </div>
                  <div class="form-group">
                    <label>Nama Toko</label>
                    <select class="form-control form-control-sm" name="nama_toko">
                      <option>- Nama Toko -</option>
                      @foreach($suppliers as $supplier)
                      <option value="{{$supplier->nama_supplier}}">{{$supplier->nama_supplier}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Cabang Toko</label>
                    <select class="form-control form-control-sm" name="cabang_toko">
                      <option>- Cabang Toko -</option>
                      @foreach($suppliers as $supplier)
                      <option value="{{$supplier->kode_cabang}}">{{$supplier->kode_cabang}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Nama Barang</label>
                    <select class="form-control form-control-sm" name="nama_barang">
                      <option>- Nama barang -</option>
                      @foreach($products as $product)
                      <option value="{{$product->nama_produk}}">{{$product->nama_produk}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Jumlah</label>
                    <input class="form-control" type="text" name="Jumlah">
                  </div>

                  <div class="form-group">
                    <label>Satuan</label>
                    <select class="form-control form-control-sm" name="Satuan">
                      <option>- Satuan -</option>
                      
                         @foreach($units as $unit)
                           <option value="{{$unit->nama_unit}}">{{$unit->nama_unit}}</option>
                   
                         @endforeach
                   
                    </select>
                  </div>
                  <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Tambahkan">
                    {{csrf_field()}}
                  </div>
 
                </form>
            </div>


            
            </div>
          </div>

        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
  </div>
  <!-- ./wrapper -->

  @include('templates.scripts')
  <!-- page script -->
  <script>
    $(function () {
      $('#example1').DataTable()
      $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
      })
    })
    var usedNames = {};
$("select[name='nama_toko'] > option").each(function () {
    if(usedNames[this.text]) {
        $(this).remove();
    } else {
        usedNames[this.text] = this.value;
    }
});


  </script>

  @include('templates.modal')
</body>
</html>
