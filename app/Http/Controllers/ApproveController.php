<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kredit;
use App\Pelanggan;

class ApproveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $kredits = Kredit::where('kredits.sts',1)
                                ->join('pelanggans','kredits.pelanggan_id','=','pelanggans.id')
                                ->join('barangs','kredits.barang_id','=','barangs.id')
                                ->join('vendors','vendors.id','=','barangs.vendor_id')
                                ->selectRaw('pelanggans.*,kredits.id as kredit_id, vendors.nama as vendor_nama, barangs.harga,barangs.nama as nama_brng')
                                ->get();
        return view('pemilik.index',compact('kredits'));
        // return $kredits;
    }
    public function update($id){
        $kredit = Kredit::findOrFail($id);
        $pelanggan = Pelanggan::findOrFail($kredit->pelanggan_id);
        $kredit->sts = 3;
        $pelanggan->sts = 3;
        $kredit->save();
        $pelanggan->save();
        return redirect()->route('approve.index');
        // return $kredit;
    }
    public function destroy($id){
        $kredit = Kredit::findOrFail($id);
        $pelanggan = Pelanggan::findOrFail($kredit->pelanggan_id);
        $pelanggan->sts = 0;
        $kredit->sts = 2;
        $kredit->save();
        $pelanggan->save();
        return redirect()->route('approve.index');
        // return $kredit;
    }
}
