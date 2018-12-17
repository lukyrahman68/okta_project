<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PelangganController extends Controller
{
    //
    public function index(){
        return view('karyawan.pelanggan.index');
    }
    public function create(){
        return view('karyawan.pelanggan.tambah');
    }
}
