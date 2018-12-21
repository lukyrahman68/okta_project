@extends('layouts.back_end')
@section('main')
<br>
<div class="container">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Detail</h3>
            </div>
            <div class="box-body table-responsive">
              <table class="table table-hover ">
                <thead>
                    <tr>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Tempat Tanggal Lahir</th>
                        <th>Telphone</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                  <tr>
                      <td>{{$pelanggan->nik}}</td>
                      <td>{{$pelanggan->nama}}</td>
                      <td>{{$pelanggan->jk}}</td>
                      <td>{{$pelanggan->alamat}}</td>
                      <td>{{$pelanggan->ttl}}</td>
                      <td>{{$pelanggan->tlpn}}</td>
                      <td>{{$pelanggan->email}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Pilih Vendor</h3>
            </div>
            <div class="box-body" id="body">
                <div class="form-group">
                    <div class="row">
                        @csrf
                        <div class="col-md-2" style="text-align: center">
                            Find By id
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="Id" name="id">
                        </div>
                        <div class="col-md-1">
                            <input type="submit" class="btn btn-primary form-control" value="Cari" id="cari">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
