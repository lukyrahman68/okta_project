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
            <div class="box-body">
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
                <button type="button" class="btn btn-primary" id="cari" name="cari">Pilih</button>

            </div>

            <div class="box-body">
                <form action="{{route('kredit.store')}}" method="POST">
                    @csrf
                    <input type="hidden" value="{{$pelanggan->id}}" name="pelanggan_id">
                    <input type="hidden" id="barang_id" name="barang_id">
                    <input type="hidden" id="vendor_id" name="vendor_id">

                    <table class="display" id="table_cari">
                        <thead>
                            <tr>
                                <td>Id</td>
                                <td>Id Vendor</td>
                                <td>Nama Barang</td>
                                <td>Nama Vendor</td>
                                <td>Harga</td>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary pull-right" id="pilih" disabled="disabled">Pilih</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
