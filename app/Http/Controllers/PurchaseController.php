<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Purchase;
use App\Product;
use App\Supplier;
use App\Unit;
use App\purchaseorder;

class PurchaseController extends Controller{

    public function index(){

        $purchases = Purchase::all()->where('status', '0');

        $products  = Product::all();
        $suppliers = Supplier::all();
        $units = Unit::all();
        $purchaseorder = purchaseorder::all();
        $data = array(
            'products'   => $products,
            'suppliers' => $suppliers,
            'units' => $units,
            'po'=>$purchaseorder
        );
        return view('gudang.purchase.index', ['purchases'=>$purchases], $data);
    }

    public function show(){

        $purchases = Purchase::orderBy('no_po', 'DESC')->get();
        return view('gudang.purchase.show', ['purchases'=>$purchases]);
    }
    
    public function store(Request $request){
        
        Purchase::create($request->all());
        return redirect('purchase')->with('pesan', 'Data berhasil ditambahkan');
    }


    public function destroy($no_po){

        DB::table('purchases')->where('no_po', $no_po)->delete();
        return redirect('purchase')->with('pesan', 'Data berhasil dihapus');
    }


    public function update(){
        
        $purchases = Purchase::where('status', '0');
        $purchases->update(['status'=>'1']);
        return back()->with('pesan', 'Data dikirim ke laporan');
    }
    

    public function report($no_po){
        $subtot= DB::table('purchases')
        ->join('products', 'purchases.nama_barang', '=', 'products.nama_produk')
        ->sum(DB::raw('purchases.Jumlah * products.Harga')) ;
     
        $data = DB::table('purchases')
        ->join('products', 'purchases.nama_barang', '=', 'products.nama_produk')
        
        ->select('purchases.*', 'products.*')
        ->where('purchases.no_po','=',$no_po)
        ->get();
        return view('gudang/purchase/print', compact('data','subtot'));
    }

    
}
