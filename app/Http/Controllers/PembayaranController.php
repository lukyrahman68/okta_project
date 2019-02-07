<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembayaran;
use App\Kredit;
use PDF;
class PembayaranController extends Controller
{
    //
    public function pembayaran(){
        
        return view('laporan.pembayaran');
    }
    public function piutang(){
        $status = 'awal';
        return view('laporan.piutang',compact('status'));
    }
    public function pendapatan(){
        $status = 'awal';
        return view('laporan.pendapatan',compact('status'));
    }
    public function pendapatan2(request $request){
        // return $request->all();
        $status = 'lanjut';
        $total = 0;
        $a = $request->awal;
        $b = $request->akhir;
        $tgl_awal=date('Y-m-d', strtotime($request->awal));
        $tgl_akhir=date('Y-m-d', strtotime($request->akhir));
        $kredit = kredit::join('kredit_details','kredits.id','=','kredit_details.kredit_id')
                ->join('pembayarans','kredits.pelanggan_id','=','pembayarans.pelanggan_id')
                ->join('barangs','barangs.id','kredits.barang_id')
                ->join('pelanggans','pelanggans.id','pembayarans.pelanggan_id')
                ->whereBetween('pembayarans.created_at', array($tgl_awal,$tgl_akhir))
                ->selectRaw('pelanggans.nama as nama_pelanggan, kredits.no_kontrak, barangs.nama as nama_barang,barangs.harga as harga,pembayarans.angsuran_ke, kredit_details.suku_bunga, kredit_details.cicilan, pembayarans.created_at as tgl, kredit_details.lama_cicilan')
                ->get();
        foreach ($kredit as $item) {
            # code...
            $cicilan = unserialize($item->cicilan);
            $item->cicilan = unserialize($item->cicilan);
            $item->pendapatan = ($item->harga/$item->lama_cicilan)+$cicilan[$item->angsuran_ke-1];
            $item->coba = $cicilan[$item->angsuran_ke-1];
            $total = $total + $item->pendapatan;
        }
        // return $kredit;
        return view('laporan.pendapatan',compact('kredit','status','total','a','b'));
        
    }
    public function piutang2(request $request){
        // $a=date("Y-m-d", $request->get('awal'));
        // $b=date("Y-m-d", $request->get('akhir'));
        // //$b=$request->get('akhir');
        // $kredit = kredit::whereBetween('pembayarans.created_at',array($a.' 00:00:00',$b.' 23:59:59'))
        //         ->join('kredit_details','kredits.id','=','kredit_details.kredit_id')
        //         ->join('pembayarans','kredits.pelanggan_id','=','pembayarans.pelanggan_id')->get();
        // return view('laporan.piutang',compact('kredit'));

        //Luky Code
        $status = 'lanjut';
        $total = 0;
        $aa = $request->awal;
        $bb = $request->akhir;
        $tgl_awal=date('Y-m-d', strtotime($request->awal));
        $tgl_akhir=date('Y-m-d', strtotime($request->akhir));
        $kredit = kredit::join('kredit_details','kredits.id','=','kredit_details.kredit_id')
                        ->join('pembayarans','kredits.pelanggan_id','=','pembayarans.pelanggan_id')
                        ->join('barangs','barangs.id','kredits.barang_id')
                        ->join('pelanggans','pelanggans.id','pembayarans.pelanggan_id')
                        ->whereBetween('pembayarans.created_at', array($tgl_awal,$tgl_akhir))
                        ->selectRaw('pelanggans.nama, kredits.no_kontrak,barangs.nama as nama_barang,barangs.harga, count(pembayarans.angsuran_ke) as total_angsuran, kredit_details.suku_bunga, kredit_details.cicilan, kredit_details.lama_cicilan,kredit_details.created_at as tgl')
                        ->groupBy('pelanggans.nama', 'kredits.no_kontrak','barangs.nama','barangs.harga','kredit_details.suku_bunga', 'kredit_details.cicilan', 'kredit_details.lama_cicilan','kredit_details.created_at')
                        ->get();
        // $kredit = kredit::join('kredit_details','kredits.id','=','kredit_details.kredit_id')
        //         ->join('pembayarans','kredits.pelanggan_id','=','pembayarans.pelanggan_id')
        //         ->join('barangs','barangs.id','kredits.barang_id')
        //         ->join('pelanggans','pelanggans.id','pembayarans.pelanggan_id')
        //         ->whereBetween('pembayarans.created_at', array($tgl_awal,$tgl_akhir))
        //         ->selectRaw('pelanggans.nama, kredits.no_kontrak, barangs.nama as nama_barang,barangs.harga as harga,pembayarans.angsuran_ke, kredit_details.suku_bunga, kredit_details.cicilan, pembayarans.created_at as tgl, kredit_details.lama_cicilan')
        //         ->get();
        foreach ($kredit as $item) {
            # code...
            $a = 0;
            $total_kredit = 0;

            $cicilan = unserialize($item->cicilan);
            for ($i=0; $i < sizeof($cicilan); $i++) { 
                # code...
                $total_kredit = $total_kredit+$cicilan[$i];
            }
            $item->cicilan = unserialize($item->cicilan);
            for ($i=0; $i < $item->total_angsuran; $i++) { 
                # code...
                $a = $a+$cicilan[$i];
            }
            $item->pendapatan = ($item->harga/$item->lama_cicilan)+$a;
            $item->total_kredit = $total_kredit+$item->harga;
            $total = $total +  $item->total_kredit;
        }
        // return $kredit;
        return view('laporan.piutang',compact('kredit','total','status','aa','bb'));
    }
    public function index(){
        return view('laporan.pembayaran');
    }
    public function store(Request $request){
        $status=0;
        $kredit = kredit::where('pelanggan_id','=',session('id'))->join('kredit_details','kredit_details.kredit_id','=','kredits.id')->get();
        $kredit2 = kredit::where('pelanggan_id','=',session('id'));
        $b = pembayaran::where('pelanggan_id','=',session('id'))->count();
        $b++;
        $a = new pembayaran();
        $a->pelanggan_id = session('id');
        $a->angsuran_ke = $b;
        $a->status = 0;
        $a->save();
        if ($request->has('upload1')) {
            $image1 = $request->file('upload1');
            $ext1 = $image1->guessClientExtension();
            $img1 = $a->pelanggan_id.'-'.$b.'.'.$ext1;
            $status++;
        }
        if ($request->has('upload2')) {
            $image2 = $request->file('upload2');
            $ext2 = $image2->guessClientExtension();
            $img2 = $a->pelanggan_id.'-'.$b.'.'.$ext2;
            $status++;
        }
        if($status==2){
            if($kredit[0]->lama_cicilan == $b){
                $kredit2->update(['sts'=>'5']);
            }
            
            $image1->move(public_path('struk/'.$a->pelanggan_id),$img1);
            $image2->move(public_path('selfi/'.$a->pelanggan_id),$img2);
        }
        return redirect()->route('uploadpembayaran');
    }
    public function cetak($a, $b){
        $total = 0;
        $tgl_awal=date('Y-m-d', strtotime($a));
        $tgl_akhir=date('Y-m-d', strtotime($b));
        $tgl_awal_show=date('d-m-Y', strtotime($a));
        $tgl_akhir_show=date('d-m-Y', strtotime($b));
        $kredit = kredit::join('kredit_details','kredits.id','=','kredit_details.kredit_id')
                ->join('pembayarans','kredits.pelanggan_id','=','pembayarans.pelanggan_id')
                ->join('barangs','barangs.id','kredits.barang_id')
                ->join('pelanggans','pelanggans.id','pembayarans.pelanggan_id')
                ->whereBetween('pembayarans.created_at', array($tgl_awal,$tgl_akhir))
                ->selectRaw('pelanggans.nama as nama_pelanggan, kredits.no_kontrak, barangs.nama as nama_barang,barangs.harga as harga,pembayarans.angsuran_ke, kredit_details.suku_bunga, kredit_details.cicilan, pembayarans.created_at as tgl, kredit_details.lama_cicilan')
                ->get();
        foreach ($kredit as $item) {
            # code...
            $cicilan = unserialize($item->cicilan);
            $item->cicilan = unserialize($item->cicilan);
            $item->pendapatan = ($item->harga/$item->lama_cicilan)+$cicilan[$item->angsuran_ke-1];
            $item->coba = $cicilan[$item->angsuran_ke-1];
            $total = $total + $item->pendapatan;
        }
        // return $kredit;
        $pdf = PDF::loadView('laporan.pdf.pendapatan', compact('kredit','total','tgl_awal_show','tgl_akhir_show'));
        return $pdf->download('pendapatan.pdf');
    }
    public function cetak_piutang($aa, $bb){
        $tgl_awal=date('Y-m-d', strtotime($aa));
        $tgl_akhir=date('Y-m-d', strtotime($bb));
        $tgl_awal_show=date('d-m-Y', strtotime($aa));
        $tgl_akhir_show=date('d-m-Y', strtotime($bb));
        $total = 0;
        $kredit = kredit::join('kredit_details','kredits.id','=','kredit_details.kredit_id')
                        ->join('pembayarans','kredits.pelanggan_id','=','pembayarans.pelanggan_id')
                        ->join('barangs','barangs.id','kredits.barang_id')
                        ->join('pelanggans','pelanggans.id','pembayarans.pelanggan_id')
                        ->whereBetween('pembayarans.created_at', array($tgl_awal,$tgl_akhir))
                        ->selectRaw('pelanggans.nama, kredits.no_kontrak,barangs.nama as nama_barang,barangs.harga, count(pembayarans.angsuran_ke) as total_angsuran, kredit_details.suku_bunga, kredit_details.cicilan, kredit_details.lama_cicilan,kredit_details.created_at as tgl')
                        ->groupBy('pelanggans.nama', 'kredits.no_kontrak','barangs.nama','barangs.harga','kredit_details.suku_bunga', 'kredit_details.cicilan', 'kredit_details.lama_cicilan','kredit_details.created_at')
                        ->get();
        foreach ($kredit as $item) {
            # code...
            $a = 0;
            $total_kredit = 0;

            $cicilan = unserialize($item->cicilan);
            for ($i=0; $i < sizeof($cicilan); $i++) { 
                # code...
                $total_kredit = $total_kredit+$cicilan[$i];
            }
            $item->cicilan = unserialize($item->cicilan);
            for ($i=0; $i < $item->total_angsuran; $i++) { 
                # code...
                $a = $a+$cicilan[$i];
            }
            $item->pendapatan = ($item->harga/$item->lama_cicilan)+$a;
            $item->total_kredit = $total_kredit+$item->harga;
            $total = $total +  $item->total_kredit;
        }
        $pdf = PDF::loadView('laporan.pdf.piutang', compact('kredit','total','tgl_awal_show','tgl_akhir_show'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('piutang.pdf');
    }
}
