@extends('layouts.back_end')
@section('main')
<br>
<div class="container">
<div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title" style="font-weight: bold">Responsive Hover Table</h3>
        <form action="{{route('vendor.update',$vendor->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama">Nama Vendor</label>
                <input type="text" class="form-control" placeholder="Nama" name="nama" value="{{$vendor->nama}}">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" placeholder="Alamat" name="alamat" value="{{$vendor->alamat}}">
            </div>
            <div class="form-group">
                <label for="tlpn">No Telphone</label>
                <input type="text" class="form-control" placeholder="Telphone" name="tlpn" value="{{$vendor->tlpn}}">
            </div>
            <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select name="kategori" id="kategori" class="form-control">
                        <option value="" disabled selected>Pilih Kategori</option>
                        <option value="Elektronik" >Elektronik</option>
                        <option value="Ponsel" >Ponsel</option>
                        <option value="Helm" >Helm</option>
                        <option value="Ban" >Ban</option>
                        <option value="Mebel" >Mebel</option>
                        <option value="Other" >Other</option>
                    </select>
                </div>
            <div class="pull-right">
                <input type="submit" value="Simpan" class="btn btn-sm btn-primary">
            </div>
        </form>
      </div>
    </div>
</div>
</div>

@endsection
