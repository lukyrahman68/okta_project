<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kredit;
class SurveyController extends Controller
{
    //
    public function index(){
        $kredits =Kredit::where('kredits.sts',1)
                                        ->join('pelanggans','kredits.pelanggan_id','=','pelanggans.id')
                                        ->join('barangs','kredits.barang_id','=','barangs.id')
                                        ->join('vendors','vendors.id','=','barangs.vendor_id')
                                        ->selectRaw('pelanggans.*,kredits.id as kredit_id, vendors.nama as vendor_nama, barangs.harga,barangs.nama as nama_brng')
                                        ->get();
        return view('pemilik.survey.index',compact('kredits'));
    }
    public function bukti_survey($id){
        return view('pemilik.survey.create');
    }
}
