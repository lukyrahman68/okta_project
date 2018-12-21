@extends('layouts.back_end')
@section('main')
<br>
<div class="container">
<div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title" style="font-weight: bold">Responsive Hover Table</h3>
        <form action="{{route('barang.update',$barang->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama">Nama Vendor</label>
                    <select class="form-control" name="vendor_id">
                      @foreach ($vendors as $vendor)
                        <option {{ $barang->vendor_id == $vendor->id?'selected':''}} value="{{$vendor->id}}">{{$vendor->nama}}</option>
                      @endforeach
                    </select>
            </div>
            <div class="form-group">
                <label for="nama_brng">Nama Barang</label>
                <input type="text" class="form-control" placeholder="Nama Barang" name="nama" value="{{$barang->nama}}">
            </div>
            <div class="form-group">
                <label for="tlpn">Harga</label>
                <input type="text" class="form-control" placeholder="Harga" name="harga" value="{{$barang->harga}}">
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
