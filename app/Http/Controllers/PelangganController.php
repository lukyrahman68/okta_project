<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;
use App\Media;
use Illuminate\Support\Facades\Auth;
use File;

class PelangganController extends Controller
{
    //
    public function index(){
        $pelanggans = Pelanggan::all();
        return view('karyawan.pelanggan.index',compact('pelanggans'));
    }
    public function create(){
        return view('karyawan.pelanggan.tambah');
    }
    public function login(request $request){
        $pelanggan= Pelanggan::where('email','=',$request->email)->where('password','=',$request->password);
        $pelanggan2= Pelanggan::where('email','=',$request->email)->where('password','=',$request->password)->first();
        if ($pelanggan->count()) {
            session(['nik' => $pelanggan2->nik]);
            session(['id'=>$pelanggan2->id]);
            return redirect('halpelanggan');
        }else{
            return redirect('loginpelanggan')->with('alert','Email / Password salah');
        }
    }
    public function store(request $request){
        $input = $request->all();
        if(!$request->has('nama_toko')){
            $input['nama_toko']='-';
            $input['alamat_toko']='-';
        }
        $pelanggan = Pelanggan::create($input);
        if($ktp = $request->file('ktp')){
            $name_ktp = time() . $ktp->getClientOriginalName();
            $ktp->move('images/'.$pelanggan->id,$name_ktp);
            $photo = Media::create(['pelanggan_id'=>$pelanggan->id, 'nama'=>$name_ktp, 'ket'=>"KTP"]);
        }
        if($kk = $request->file('kk')){
            $name_kk = time() . $kk->getClientOriginalName();
            $kk->move('images/'.$pelanggan->id,$name_kk);
            $photo = Media::create(['pelanggan_id'=>$pelanggan->id, 'nama'=>$name_kk, 'ket'=>"KK"]);
        }
        if($kk = $request->file('photo')){
            $name_photo = time() . $kk->getClientOriginalName();
            $kk->move('images/'.$pelanggan->id,$name_photo);
            $photo = Media::create(['pelanggan_id'=>$pelanggan->id, 'nama'=>$name_photo, 'ket'=>"Pas Photo"]);
        }
        if($request->dp){
            foreach ($request->dp as $item_dp) {
                if($dp = $item_dp){
                    $name_dp = time() . $dp->getClientOriginalName();
                    $dp->move('images/'.$pelanggan->id,$name_dp);
                    $photo = Media::create(['pelanggan_id'=>$pelanggan->id, 'nama'=>$name_dp, 'ket'=>"Dokumen Pendukung"]);
                }
            }
        }


        return redirect()->route('pelanggan.index')->with('alert','Berhasil ditambah');
    }
    public function update(request $request, $id){
        $input = $request->all();
        $pelanggan = Pelanggan::find($id);


        if($request->dp){
            foreach ($request->dp as $item_dp) {
                if($dp = $item_dp){
                    $name_dp = time() . $dp->getClientOriginalName();
                    $dp->move('images/'.$pelanggan->id,$name_dp);
                    $photo = Media::create(['pelanggan_id'=>$pelanggan->id, 'nama'=>$name_dp, 'ket'=>"Dokumen Pendukung"]);
                }
            }
        }

        $pelanggan->update($input);
        return redirect()->route('pelanggan.index');
    }
    public function edit(request $request,$id){
        $pelanggan = Pelanggan::findOrfail($id); 
        $media = Media::where('pelanggan_id', '=',$id)->get(); 
        $data = array(
            'pelanggan'  => $pelanggan,
            'media' => $media
        );
        return view('karyawan.pelanggan.edit')->with($data);
    }
    public function ubah_img(request $request,$id){
        $media = Media::findOrFail($id);
        $img_name =  $request->file('img');
        $name_img = time() .$img_name->getClientOriginalName();
        File::delete('images/'.$media->pelanggan_id.'/'.$media->nama);
        $img_name->move('images/'.$media->pelanggan_id,$name_img);
        $media['nama'] = $name_img;
        $media->save();
        return redirect()->route('pelanggan.edit',$media->pelanggan_id);
    }
    public function add_img(request $request,$id){
        $name_img = time() .$request->file('img')->getClientOriginalName();
        $request['ket'] = 'Dokumen Pendukung';
        $request['nama'] = $name_img;
        $request['pelanggan_id'] = $id;
        $request->file('img')->move('images/'.$id,$name_img);
        $media = Media::create($request->all());
        return redirect()->route('pelanggan.edit',$id);
    }
    public function delete_img($id){
        $media = Media::findOrFail($id);
        $pelanggan_id = $media->pelanggan_id;
        File::delete('images/'.$media->pelanggan_id.'/'.$media->nama);
        $media->delete();
        return redirect()->route('pelanggan.edit',$pelanggan_id);

    }
    public function destroy($id){
        $pelanggan = Pelanggan::findOrFail($id);
        $media = Media::where('pelanggan_id', '=', $id);
        File::deleteDirectory(public_path('images/'.$pelanggan->id));
        $pelanggan->delete();
        $media->delete();
        return redirect()->route('pelanggan.index');
    }
}
