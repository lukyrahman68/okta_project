@extends('layouts.back_end')
@section('main')
<br>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">History Kredit</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table class="table table-hover " id="myTable">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>No Kontrak</th>
                        <th>Nama Vendor</th>
                        <th>Nama Barang</th>
                        <th>Jatuh Tempo</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($pelanggans as $pelanggan)
                  <tr>
                      <td>{{$pelanggan->nama}}</td>
                      <td>{{$pelanggan->no_kontrak}}</td>
                      <td>{{$pelanggan->nama_vendor}}</td>
                      <td>{{$pelanggan->nama_barang}}</td>
                      <td>{{$pelanggan->jatuh_tempo}}</td>

                  </tr>

                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </div>
</div>
@endsection
