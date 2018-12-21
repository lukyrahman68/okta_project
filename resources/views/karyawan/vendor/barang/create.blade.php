@extends('layouts.back_end')
@section('main')
<br>
<div class="container">
<div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title" style="font-weight: bold">Responsive Hover Table</h3>
        <form action="{{route('barang.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama">Nama Vendor</label>
                    <select class="form-control">
                      @foreach ($vendors as $vendor)
                        <option value="{{$vendor->id}}">{{$vendor->nama}}</option>
                      @endforeach
                    </select>
            </div>
            <div class="form-group">
                <label for="alamat">Nama Barang</label>
                <input type="text" class="form-control" placeholder="Alamat" name="alamat">
            </div>
            <div class="form-group">
                <label for="tlpn">Harga</label>
                <input type="text" class="form-control" placeholder="Telphone" name="tlpn">
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
