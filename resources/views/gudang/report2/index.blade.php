<!DOCTYPE html>
<html lang="en">
<head>
  @include('templates.head')
  <title>Purchase Order</title>
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
          <h3>Buat Purchase Order</h3>
          <hr>
        </div>
      </section>

      <!-- Main content -->
      <section class="content mt-2">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-4 pl-3 pr-3">
              @include('gudang/notification')
                @include('gudang/validation')
                <div>
                  <a href="{{ route('report.show') }}"> <button class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-plus"></i> Liat PO</button></a>
                </div><br>
                <form action="{{ route('report.store') }}" method="post">
                  <div class="form-group">
                    <label>No Po</label>
                    <input class="form-control" type="text" name="no_po">
                  </div>
                  <div class="form-group">
                    <label>Nama Supplier</label>
                    <select class="form-control form-control-sm" name="supplier">
                      <option>- Supplier -</option>
                      
                         @foreach($toko as $tokos)
                           <option value="{{$tokos->id_toko}}">{{$tokos->nama_toko}}</option>
                   
                         @endforeach
                   
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Nama Barang</label>
                    <input class="form-control" type="text" name="namabarang">
                  </div>
                  <div class="form-group">
                    <label>Qty</label>
                    <input class="form-control" type="text" name="qty">
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
                    <label>Harga</label>
                    <input class="form-control" type="text" name="harga">
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
