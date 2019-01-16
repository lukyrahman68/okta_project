<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;
use App\Vendor;
use App\Barang;
use App\Kredit;
use Response;
class KreditController extends Controller
{
    //
    public function index(){
        $pelanggans = Pelanggan::all();
        return view('karyawan.kredit.index',compact('pelanggans'));
    }
    public function show(){
        return "tes";
    }
    public function kredit_detail($id){
        $pelanggan = Pelanggan::findOrFail($id);
        // $vendor = Vendor::barangs;
        // return $vendor;
        return view('karyawan.kredit.detail',compact('pelanggan','status'));
    }
    public function cari(request $request){
        // $data = Vendor::join('barangs','barangs.vendor_id','=','vendors.id')
        //         // ->where('vendors.kategori','=',$request->kategori)
        //         ->selectRaw('*,vendors.nama as nama_vendor')
        //         ->where('vendors.kategori','like',$request->kategori)
        //         ->get();
        $data = Vendor::with('barangs')->where('kategori','=',$request->kategori)
        ->get();
        // $barangs = Barang::where('vendor_id',$request->id)->get();
        // $data = Vendor::findOrFail($request->id);
        // $barangs = Barang::where('vendor_id',$request->id)->get();
        // $data = Vendor::where('vendors.id',$request->id)
        //                 ->join('barangs','barangs.vendor_id','=','vendors.id')
        //                 ->selectRaw('*,barangs.nama as nama_brng')
        //                 ->first();
        return response()->json($data);
    }
    public function create(request $request){
        // $data = $request->all();
        // $data['sts'] = 0;
        // Kredit::create($data);
        // return response()->json($data);
        return $request->all();
    }
    public function status(){
        $diterimas = Kredit::where('sts',1)
                                ->join('pelanggans','kredits.pelanggan_id','=','pelanggans.id')
                                ->join('barangs','kredits.barang_id','=','barangs.id')
                                ->join('vendors','vendors.id','=','barangs.vendor_id')
                                ->selectRaw('pelanggans.*,kredits.id as kredit_id, vendors.nama as vendor_nama, barangs.harga,barangs.nama as nama_brng')
                                ->get();
        $ditolaks = Kredit::where('sts',2)
                                ->join('pelanggans','kredits.pelanggan_id','=','pelanggans.id')
                                ->join('barangs','kredits.barang_id','=','barangs.id')
                                ->join('vendors','vendors.id','=','barangs.vendor_id')
                                ->selectRaw('pelanggans.*,kredits.id as kredit_id, vendors.nama as vendor_nama, barangs.harga,barangs.nama as nama_brng')
                                ->get();
        return view('karyawan.kredit.status',compact('diterimas','ditolaks'));
    }

}
