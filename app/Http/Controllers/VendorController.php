<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendor;
class VendorController extends Controller
{
    //
    public function index(){
        $vendors = Vendor::all();
        return view('karyawan.vendor.index',compact('vendors'));
    }
    public function create(){
        return view('karyawan.vendor.create');
    }
    public function store(request $request){
        Vendor::create($request->all());
        return redirect()->route('vendor.index')->with('alert','Berhasil ditambah');
    }
    public function edit($id){
        $vendor=vendor::findOrFail($id);
        return view('karyawan.vendor.edit',compact('vendor'));
    }
    public function update(request $request,$id){
        $vendor=vendor::findOrFail($id);
        $vendor->update($request->all());
        return redirect()->route('vendor.index');
    }
    public function destroy($id){
        $vendor = Vendor::findOrFail($id);
        $vendor->delete();
        return redirect()->route('vendor.index');
    }

}
