<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\toko;

class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $toko = toko::orderBy('nama_toko', 'DESC')->get();
        //dd($toko);
        return view('gudang.Toko.index', ['toko'=>$toko]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

      return view('gudang.toko.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        
      $toko = new toko;
      $toko->id_toko    = $request->kode;
      $toko->nama_toko   = $request->nama;
      $toko->alamat_toko   = $request->alamat ;
      $toko->kelurahan  = $request->kel ;
      $toko->kecamatan   = $request->kec ;
      $toko->telepon   = $request->telepon ;
      $toko->email  = $request->email ;
      
      $toko->save();
      // dd('kesini');

      return redirect('toko')->with('pesan', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id_supplier){

    //   return view('gudang.supplier.show', ['suppliers' => Supplier::findOrFail($id_supplier)]);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($kode_toko)
    {   
        $tokos = toko::where('kode_toko',$kode_toko);
       // dd($tokos);
       
     
       return view('gudang.Toko.edit', ['tokos'=>$tokos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kode_toko)
    {
        $products = toko::find($kode_toko);
        $products->no_po = $request->nopo;
        $products->id_toko = $request->supplier;
        $products->nama_barang = $request->nama;
        $products->qty = $request->qty;
        $products->satuan=$request->satuan;
       
        $products->Harga = $request->harga;
      
        $products->save();
        return redirect('report2')->with('pesan', 'Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_toko){

      DB::table('toko')->where('id_toko', $id_toko)->delete();
      return back()->with('pesan', 'Data berhasil dihapus');
    }
}
