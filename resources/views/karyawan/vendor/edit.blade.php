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
                <label for="barang">Nama Barang</label>
                <input type="text" class="form-control" placeholder="Nama Barang" name="barang" value="{{$vendor->barang}}">
            </div>
            <div class="form-group">
                <label for="harga">Harga</label><br>
                <div class="row">
                    <div class="col-md-1" style="text-align: center">
                        Rp.
                    </div>
                    <div class="col-md-2">
                        <input type="number" class="form-control" placeholder="Harga" name="harga" value="{{$vendor->harga}}">
                    </div>
                </div>
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
