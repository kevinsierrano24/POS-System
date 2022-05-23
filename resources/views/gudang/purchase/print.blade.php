<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  

  <!-- Custom styles for this template -->

  <title>CV Mulyatama</title>
  
<style>
    .tengah{
        text-align: center;
    }
    body{
      font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
      text-align: left;
      white-space: nowrap;
    }
    .webviewer {
  height: 100vh;
  width: 100%;
}
    </style>
</head>

<body>
@extends('layouts.app')
@section('content')
<script>

    </script>
 
<div class="content">
         <div class="container-fluid">
           <div class="invoice p-3 mb-3">
             <div class="row">
              <div class="container-fluid" id="printpage">


               

                <h3 class = "tengah">Surat Jalan</h3>
               <!--- tambah elemen --->
                <span id="test2"></span>
                <table class="table table-bordered table-hover" width="100%" style="border: 2px black;" >
                    <thead>
                      <?php $no=1; ?>
                      <tr style="background-color: rgb(230, 230, 230); ">
                        <th>No</th>
                        <th>No PO</th>
                        <th>Tanggal</th>
                        <th>Nama Toko</th>
                        <th>Cabang Toko</th>
                        <th>Nama Barang</th>
                        <th>Barcode</th>
                        <th>Jumlah Pcs</th>
                        <th>Jumlah Pak</th>
                        <th>Harga</th>
                        <th>Jumlah Harga</th>
                      
                      
                      
                        
                      </tr>
                    </thead>
                    <tbody id="hasil">
                      @foreach($data as $supplier)
                      <tr id="hasil2">
                        <td>{{ $no++ }}</td>
                        <td>{{ $supplier->no_po }}</td>
                        <td>{{ $supplier->tanggal }}</td>
                        <td>{{ $supplier->nama_toko }}</td>
                        <td>{{ $supplier->cabang_toko }}</td>
                        <td>{{ $supplier->nama_barang }}</td>
                        <td>{{ $supplier->Barcode }}</td>
                        <td>{{ $supplier->Jumlah }}</td>
                        <td>{{ $supplier->Jumlah/$supplier->pcs_pak }}</td>
                        <td> {{number_format($supplier->Harga)}}</td>
                        <td>{{number_format($supplier->Harga*$supplier->Jumlah)}}</td>
                     
                        
                    
                      </tr>
                     
                      @endforeach
                      <tr >
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>Total : </th>
                        <td >{{"Rp.".number_format($subtot)}}</td>
                      </tr>
                    </tbody>
                  </table>
                
              </div>
            </div>
          </div>
            <!-- /#page-content-wrapper -->
        
          </div>
          <!-- /#wrapper -->
        
          <!-- Bootstrap core JavaScript -->
         
                </div>
            </div>
        </div>
        <hr>
       </div> 
       @endsection
       @include('templates.scripts')
       <script src="../../../../../render.js"></script>
  <script> window.jQuery = window.$ = require('jquery'); </script>
  <script src="node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script>
  $(document).ready( function () {
        $('#table_id').DataTable();
    } );
  </script>