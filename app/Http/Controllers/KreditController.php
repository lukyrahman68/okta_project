<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;
use App\Vendor;
use App\Barang;
use App\Kredit;
use App\DetailKredit;
use Response;
class KreditController extends Controller
{
    //
    public function index(){
        $pelanggans = Pelanggan::all()->where('sts','!=','4');
        return view('karyawan.kredit.index',compact('pelanggans'));
    }
    public function show(){
        return "tes";
    }
    public function kredit_detail($id){
        $pelanggan = Pelanggan::findOrFail($id);
        // $vendor = Vendor::barangs;
        // return $vendor;
        return view('karyawan.kredit.detail',compact('pelanggan'));
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
    public function store(request $request){

        $barang = explode(',',$request->barang_id);
        $vendor = explode(',',$request->vendor_id);
        for($i=0;$i<sizeof($barang);$i++){
            $kredit = new Kredit;
            $kredit->pelanggan_id = $request->pelanggan_id;
            $kredit->sts = 1;
            $kredit->vendor_id = $vendor[$i];
            $kredit->barang_id = $barang[$i];
            $kredit->save();
        }
        $pelanggan = Pelanggan::find($request->pelanggan_id);
        $pelanggan->update(['sts'=>'1']);
        return redirect()->route('kredit.index');
    }
    public function status(){
        $diterimas = Kredit::where('kredits.sts',3)
                                ->join('pelanggans','kredits.pelanggan_id','=','pelanggans.id')
                                ->join('barangs','kredits.barang_id','=','barangs.id')
                                ->join('vendors','vendors.id','=','barangs.vendor_id')
                                ->selectRaw('pelanggans.*,kredits.id as kredit_id, vendors.nama as vendor_nama, barangs.harga,barangs.nama as nama_brng')
                                ->get();
        $ditolaks = Kredit::where('kredits.sts',2)
                                ->join('pelanggans','kredits.pelanggan_id','=','pelanggans.id')
                                ->join('barangs','kredits.barang_id','=','barangs.id')
                                ->join('vendors','vendors.id','=','barangs.vendor_id')
                                ->selectRaw('pelanggans.*,kredits.id as kredit_id, vendors.nama as vendor_nama, barangs.harga,barangs.nama as nama_brng')
                                ->get();
        return view('karyawan.kredit.status',compact('diterimas','ditolaks'));
    }
    public function proses($id){
        $pelanggan=Pelanggan::find($id)
                                ->join('kredits','kredits.pelanggan_id','=','pelanggans.id')
                                ->selectRaw('pelanggans.*,kredits.*,kredits.id as kredit_id,pelanggans.id as pelanggan_id')
                                ->first();
        $barang = Barang::findOrFail($pelanggan->barang_id);
        $vendor = Vendor::findOrFail($pelanggan->vendor_id);
        return view('karyawan.kredit.proses',compact('pelanggan','barang','vendor'));
    }
    public function simpan(request $request){
        $cicilan = serialize($request->cicilan);
        $kredit_details = new DetailKredit;
        $kredit_details->kredit_id = $request->id_kredit;
        $kredit_details->lama_cicilan = $request->lama_cicilan;
        $kredit_details->suku_bunga = $request->suku_bunga;
        $kredit_details->cicilan = $cicilan;
        $kredit_details->jatuh_tempo = $request->jatuh_tempo;
        $kredit_details->save();

        //find pelanggan
        $pelanggan=Pelanggan::find($request->pelanggan_id);
        $pelanggan->update(['sts'=>'4']);

        //find kredit_id
        $kredit = Kredit::find($request->id_kredit);
        $kredit->update(['sts'=>'4']);
        return response()->json($kredit_details);
    }
    public function history(){
        $pelanggans = Pelanggan::join('kredits','kredits.pelanggan_id','pelanggans.id')
                                ->join('vendors','vendors.id','kredits.vendor_id')
                                ->join('barangs','barangs.id','kredits.barang_id')
                                ->join('kredit_details','kredit_details.kredit_id','kredits.id')
                                ->selectRaw('pelanggans.nama,kredits.no_kontrak,vendors.nama as nama_vendor,barangs.nama as nama_barang,kredit_details.jatuh_tempo')
                                ->where('kredits.sts','=','5')
                                ->get();
        return view('karyawan.kredit.history',compact('pelanggans'));
    }

}
