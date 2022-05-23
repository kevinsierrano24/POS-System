<!DOCTYPE html>
<html lang="en">

<head>

  @include('templates.head')
  <title>Data PO</title>

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
              <h3 class="box-title">Data PO</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              @include('gudang/notification')
              <div>
               
              </div><br>
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <?php $no=1; ?>
                  <tr style="background-color: rgb(230, 230, 230);">
                    <th>No</th>
                    <th>No PO</th>
                   
                    <th>Nama Supplier</th>
                    <th>Alamat Supplier</th>
                    <th>Telepon</th>
                    <th>Email</th>
                    <th>Nama Barang</th>
                    <th>qty</th>
                    <th>Satuan</th>
                    <th>Harga</th>
                    <th>Total Harga</th>
                    <th>Action</th>
                  
                    
                  </tr>
                </thead>
                <tbody>
                  @foreach($purchases as $supplier)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $supplier->no_po }}</td>
                  
                    <td>{{ $supplier->nama_toko}}</td>
                    <td>{{ $supplier->alamat_toko}}</td>
                    <td>{{ $supplier->telepon}}</td>
                    <td>{{ $supplier->email}}</td>
                    <td>{{ $supplier->nama_barang }}</td>
                    <td>{{ $supplier->qty }}</td>
                    <td>{{ $supplier->satuan }}</td>
                    <td>{{ $supplier->Harga }}</td>
                    <td>{{ $supplier->Harga * $supplier->qty }}</td>
                    <td class="print">
                     
                      @if(Auth::user()->akses == 'admin')
                      
                     
                        <a href="/report2/{{$supplier->no_po}}/delete"><button class="btn btn-danger btn-sm">Delete</button></a>
                      @endif
                      <a href="/report2/{{$supplier->no_po}}/print"><button class="btn btn-warning btn-sm">Print</button></a>
                    </td>
                      
                  
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </section>

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
  </script>

  <!-- modal -->
  <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="background-color: rgb(200, 200, 200)">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title text-center" id="myModalLabel">Delete Confirmation</h4>
        </div>
        <form action="{{route('report2.destroy', 'test')}}" method="post">
          {{method_field('delete')}}
          {{csrf_field()}}
          <div class="modal-body" style="background-color: rgb(230, 230, 230)">
            <p class="text-center">Apakah anda yakin akan menghapus ini?</p>
            <input type="hidden" name="no_po" id="del_id" value="">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger">Ya, hapus ini</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak, kembali</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  @include('templates.modal')
</body>
</html>
