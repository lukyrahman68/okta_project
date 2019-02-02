@extends('layouts.back_end_pelanggan')
@section('main')
<br>
<div class="container">
    <a href="{{route('pelanggan.create')}}" class="btn btn-sm btn-primary">Tambah</a>
    <br>
    <br>
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Responsive Hover Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table class="table table-hover" id="myTable">
                <thead>
                    <tr>
                        <th>Tenor</th>
                        <th>Telah Dibayar</th>
                        <th>Sisa Cicilan</th>
                    </tr>
                </thead>
                <tbody>
                    {{--@foreach ($transaksi as $transaksi)
                  <tr>
                      <td>{{$pelanggan->nik}}</td>
                      <td>{{$pelanggan->nama}}</td>
                      <td>{{$pelanggan->jk}}</td>
                  </tr>
                  @endforeach--}}
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
