<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Vendor;

class BarangController extends Controller
{
    //
    public function index(){
        $barangs = Barang::all();
        return view('karyawan.vendor.barang.index',compact('barangs'));
    }
    public function create(){
        $vendors = Vendor::all(['nama', 'id']);
        return view('karyawan.vendor.barang.create',compact('vendors'));
    }
    public function store(request $request){

    }
}
