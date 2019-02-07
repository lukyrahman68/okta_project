<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kredit;
use App\Pelanggan;
use App\Survey;
use App\Pembayaran;
use Response;

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
        $panjang = strlen($pelanggan->nik);
        $mulai = $panjang - 5;
        $nik = substr($pelanggan->nik, $mulai, $panjang);
        $no_kontrak = $nik.'-'.$id;
        $kredit->no_kontrak = $no_kontrak;
        $kredit->sts = 3;
        $pelanggan->sts = 3;
        $kredit->save();
        $pelanggan->save();
        return redirect()->route('approve.index')->with('alert','Berhasil diubah');
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
    public function cari_img($id){
        $media = Pelanggan::where('media.pelanggan_id','=',$id)
                            ->join('media','media.pelanggan_id','=','pelanggans.id')
                            ->selectRaw('media.*')
                            ->get();
        return response()->json($media);
    }
    public function detail($id){
        $kredit = Kredit::where('kredits.id',$id)
                                ->join('pelanggans','kredits.pelanggan_id','=','pelanggans.id')
                                ->join('barangs','kredits.barang_id','=','barangs.id')
                                ->join('vendors','vendors.id','=','barangs.vendor_id')
                                ->selectRaw('pelanggans.*,kredits.id as kredit_id, vendors.nama as vendor_nama, barangs.harga,barangs.nama as nama_brng')
                                ->first();
        $surveys = Survey::join('hasil_surveys','hasil_surveys.survey_id','surveys.id')
                            ->where('hasil_surveys.pelanggan_id','=',$kredit->id)
                            ->selectRaw('hasil_surveys.jawaban,surveys.pertanyaan')
                            ->get();
        return view('pemilik.detail',compact('kredit','surveys'));
        // return $kredits;
    }
    public function pembayaran_index(){
        $pembayarans = Pembayaran::where('status','=','0')
                                    ->join('pelanggans','pelanggans.id','pembayarans.pelanggan_id')
                                    ->join('kredits','kredits.pelanggan_id','pelanggans.id')
                                    ->join('vendors','vendors.id','kredits.vendor_id')
                                    ->join('barangs','barangs.id','kredits.barang_id')
                                    ->selectRaw('pelanggans.nama as nama_pelanggan,vendors.nama as nama_vendor,barangs.nama as nama_barang,pembayarans.*')
                                    ->get();
        return view('pemilik.pembayaran.index', compact('pembayarans'));
        // return $pembayarans;
    }
    public function pembayaran_approve($id){
        //status 1 diterima
        $pembayaran = Pembayaran::find($id);
        $pembayaran->status = '1';
        $pembayaran->save();
        return redirect()->route('pembayaran.index');
    }
    public function pembayaran_tolak($id){
        //status 2 ditolak
        $pembayaran = Pembayaran::find($id);
        $pembayaran->status = '2';
        $pembayaran->save();
        return redirect()->route('pembayaran.index');
    }
}
