<div class="bg-light border-right" id="sidebar-wrapper">
  <div class="sidebar-heading">Sistem Pergudangan </div>
  <div class="list-group list-group-flush">
    <a href="{{ url('/home') }}" class="list-group-item list-group-item-action bg-light">Dashboard</a>

    <a href="{{ route('product.index') }}" class="list-group-item list-group-item-action bg-light">Data Barang</a>

    <a href="{{ route('suratjalan.index') }}" class="list-group-item list-group-item-action bg-light">Buat Surat Jalan</a>
    <a href="{{ route('report2.index') }}" class="list-group-item list-group-item-action bg-light">Buat PO Supplier</a>
    <a href="{{ route('toko.index') }}" class="list-group-item list-group-item-action bg-light">Supplier</a>

    <!-- yang hanya bisa diakses admin -->
    @if(Auth::user()->akses == 'admin')
    <a href="{{ route('unit.index') }}" class="list-group-item list-group-item-action bg-light">Satuan</a>
    <a href="{{ route('user.index') }}" class="list-group-item list-group-item-action bg-light">User</a>
    <a href="{{ route('supplier.index') }}" class="list-group-item list-group-item-action bg-light">Toko</a>
    
    @endif

  </div>
</div>