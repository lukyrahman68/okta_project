<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembayaran;
class PembayaranController extends Controller
{
    //
    public function pembayaran(){
        return view('laporan.pembayaran');
    }
    public function index(){
        return view('laporan.pembayaran');
    }
    public function store(Request $request){
        $status=0;
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
            $image1->move(public_path('struk'),$img1);
            $image2->move(public_path('selfi'),$img2);
        }
        return redirect()->route('uploadpembayaran');
    }
}
