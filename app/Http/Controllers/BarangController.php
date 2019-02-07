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
        Barang::create($request->all());
        return redirect()->route('barang.index')->with('alert','Berhasil ditambah');
    }
    public function edit($id){
        $barang = Barang::findOrFail($id);
        $vendors = Vendor::all(['nama', 'id']);
        return view('karyawan.vendor.barang.edit',compact('barang','vendors'));
    }
    public function update(request $request, $id){
        $barang = Barang::findOrFail($id);
        $barang->update($request->all());
        return redirect()->route('barang.index')->with('alert','Berhasil diubah');
    }
    public function destroy($id){
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return redirect()->route('barang.index');
    }
}
