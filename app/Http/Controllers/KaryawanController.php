<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
use Auth;

class KaryawanController extends Controller
{
    //
    public function index(){
        $users = User::whereRaw('is_owner=0')
                        ->get();
        return view('pemilik.karyawan.index', compact('users'));
    }
    public function edit($id){
        $user = User::find($id);
        return view('pemilik.karyawan.edit', compact('user'));
    }
    public function update(request $request, $id){
        $user = User::find($id);
        $user->update($request->all());
        Session::flash('berhasil', 'Data Berhasil Diubah');
        return redirect()->route('karyawan.index');
    }
    public function destroy($id){
        $user = User::find($id);
        $user->delete();

        Session::flash('berhasil', 'Data Berhasil Dihapus');
        return redirect()->route('karyawan.index');
    }
}
