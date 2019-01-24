@extends('layouts.back_end')
@section('main')
<br>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Status Pengajuan Kredit</h3>
            </div>
            <!-- /.box-header -->
            <div class="row">
                <hr>
                <div class="col-md-6" style="border-right: 1px solid #eee">
                    <div style="text-align: center;background-color: #a3fc83;padding:1em;">Diterima</div>
                    <div class="box-body table-responsive">
                      <table class="table table-hover " id="myTable">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Telphone</th>
                                <th>Vendor</th>
                                <th>Barang</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($diterimas as $kredit)
                          <tr>
                              <td>{{$kredit->nama}}</td>
                              <td>{{$kredit->alamat}}</td>
                              <td>{{$kredit->tlpn}}</td>
                              <td>{{$kredit->vendor_nama}}</td>
                              <td>{{$kredit->nama_brng}}</td>
                              <td>{{$kredit->harga}}</td>
                              <td>
                                  <a href="{{route('kredit.proses',$kredit->id)}}" class="btn btn-primary btn-sm">Proses</a>
                              </td>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <div style="text-align: center;background-color: #fc8f82;padding:1em;">Ditolak</div>
                    <div class="box-body table-responsive">
                      <table class="table table-hover " id="myTable">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Telphone</th>
                                <th>Vendor</th>
                                <th>Barang</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($ditolaks as $tolak)
                          <tr>
                              <td>{{$tolak->nama}}</td>
                              <td>{{$tolak->alamat}}</td>
                              <td>{{$tolak->tlpn}}</td>
                              <td>{{$tolak->vendor_nama}}</td>
                              <td>{{$tolak->nama_brng}}</td>
                              <td>{{$tolak->harga}}</td>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
          </div>
          <!-- /.box -->
        </div>
    </div>
</div>
@endsection
