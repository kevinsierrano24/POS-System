<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Purchase;
use App\Product;
use App\purchaseorder;
use App\Unit;
use App\toko;


class Report2Controller extends Controller{

    public function index(){
        $units = Unit::all();
    	$purchases = purchaseorder::all();
        $toko = toko::all();
        $data = array(
        'toko' => $toko,
         'units' => $units
        );
        return view('gudang.report2.index', ['purchases'=>$purchases],$data);
    }
    public function show(){
        $data = DB::table('po')
        ->join('toko', 'toko.id_toko', '=', 'po.id_toko')
        
        ->select('toko.*', 'po.*')
      
        ->get();

        $purchases = purchaseorder::orderBy('no_po', 'DESC')->get();
        //$toko = toko::where('kode_toko',$purchases->id_toko);
        
        return view('gudang.report2.show', ['purchases'=>$data]);
    }
    public function store(Request $request){
     
        $toko = new purchaseorder;
      $toko->no_po    = $request->no_po;
      $toko->id_toko   = $request->supplier;
      $toko->nama_barang   = $request->namabarang ;
      $toko->qty   = $request->qty ;
      $toko->satuan  = $request->Satuan ;
      $toko->Harga  = $request->harga ;
      $toko->save();
     
      return redirect('report2')->with('pesan', 'Data berhasil ditambahkan');
    }


    public function destroy($no_po)
    {
        $po = purchaseorder::find($no_po);
        $po->delete();
        return back()->with('pesan', 'Data berhasil dihapus');
    }

   


        
       public function update(Request $request, $no_po)
    {
        $products = purchaseorder::find($no_po);
        $products->no_po = $request->nopo;
        $products->id_toko = $request->supplier;
        $products->nama_barang = $request->nama;
        $products->qty = $request->qty;
        $products->satuan=$request->satuan;
       
        $products->Harga = $request->harga;
      
        $products->save();
        return redirect('report2')->with('pesan', 'Data berhasil di update');
        
    }

    public function edit($no_po)
    {    $units = Unit::all();
        $products = purchaseorder::find($no_po);
        $toko = toko::all();
        $data = array(
            'toko' => $toko,
             'units' => $units
            );
        return view('gudang/report2/edit', compact('products'),$data);
    }
    public function report($no_po){
        $subtot= DB::table('po')
        ->join('toko', 'toko.id_toko', '=', 'po.id_toko')
        ->sum(DB::raw('po.Harga * po.qty')) ;
     
        $data = DB::table('po')
        ->join('toko', 'toko.id_toko', '=', 'po.id_toko')
        
        ->select('po.*', 'toko.*')
        ->where('po.no_po','=',$no_po)
        ->get();
        return view('gudang/report2/print', compact('data','subtot'));
    }
}
