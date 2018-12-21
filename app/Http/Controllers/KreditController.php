<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;
use App\Vendor;
use Response;
class KreditController extends Controller
{
    //
    public function index(){
        $pelanggans = Pelanggan::all();
        return view('karyawan.kredit.index',compact('pelanggans'));
    }
    public function kredit_detail($id){
        $pelanggan = Pelanggan::findOrFail($id);
        return view('karyawan.kredit.detail',compact('pelanggan','status'));
    }
    public function cari(request $request){
        $data = Vendor::findOrFail($request->id);
        return response()->json($data);
    }
    public function tes(request $request){
        $hasil = Vendor::create($request->all());
        return response()->json($hasil);
    }

}
