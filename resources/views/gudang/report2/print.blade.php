<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  @include('templates.head')
  <title>Print Surat Jalan</title>
<style>
    .tengah{
        text-align: center;
    }
    .webviewer {
  height: 100vh;
  width: 100%;
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

     
	
	<div>
	
	<form name>
  <p>List of printers:</p>
  
  <div id='list_printers'>

  </div>

  <br>  

  <p>Width</p>
  <input type="radio" id="w1" name="width" value="140px">
  <label for="w1">140px</label><br>
  
  <input type="radio" id="w2" name="width" value="170px">
  <label for="w2">170px</label><br>
  
  <input type="radio" id="w3" name="width" value="200px">
  <label for="w3">200px</label><br>
  
  <input type="radio" id="w4" name="width" value="250px">
  <label for="w4">250px</label><br>
  
  <input type="radio" id="w5" name="width" value="300px">
  <label for="w5">300px</label><br>
  <input type="radio" id="w6" name="width" value="1000px">
  <label for="w6">1000px</label><br>
  
 
</form>
	
	</div>
	
  <input onclick="print()" type="button" value="print"/>      
      
        <div class="webviewer" id="viewer">
      <div class="container-fluid">
        <h3 class = "tengah">Purchase Order</h3>
      
        <span id="test2"></span>
        <table id="example1" class="table table-bordered table-hover">
            <thead>
              <?php $no=1; ?>
              <tr style="background-color: rgb(230, 230, 230);">
                <th>No</th>
                <th>No PO</th>
               
                <th>Nama Supplier</th>
                <th>Alamat Supplier</th>
                <th>Kelurahan</th>
                <th>Kecamatan</th>
                <th>Telepon</th>
                <th>Email</th>
                <th>Nama Barang</th>
                <th>qty</th>
                <th>Satuan</th>
                <th>Harga</th>
                <th>Total Harga</th>
              
              
                
              </tr>
            </thead>
            <tbody id="hasil">
              @foreach($data as $supplier)
              <tr id="hasil2">
                <td>{{ $no++ }}</td>
                <td>{{ $supplier->no_po }}</td>
              
                <td>{{ $supplier->nama_toko}}</td>
                <td>{{ $supplier->alamat_toko}}</td>
                <td>{{ $supplier->kelurahan}}</td>
                <td>{{ $supplier->kecamatan}}</td>
                <td>{{ $supplier->telepon}}</td>
                <td>{{ $supplier->email}}</td>
                <td>{{ $supplier->nama_barang }}</td>
                <td>{{ $supplier->qty }}</td>
                <td>{{ $supplier->satuan }}</td>
                <td>{{ $supplier->Harga }}</td>
                <td>{{ $supplier->Harga * $supplier->qty }}</td>
                <td class="print">
                @if(Auth::user()->akses == 'admin')
                            
                  @endif
                </td>
              </tr>
              @endforeach
             
            </tbody>
          </table>
        
      </div>
    </div>
  </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  @include('templates.scripts')
  <script src="../../../../../render2.js"></script>
  <script> window.jQuery = window.$ = require('jquery'); </script>
  <script src="node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script>
  $(document).ready( function () {
        $('#table_id').DataTable();
    } );
  </script>
</body>

</html>
