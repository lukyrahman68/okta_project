@extends('layouts.back_end')
@section('main')
<br>
<div class="container">
    <br>
    <br>
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Pertanyaan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                @if (Session::has('add'))
                    <div class="alert alert-success">{{ Session('add') }}</div>
                @elseif(Session::has('add_e'))
                    <div class="alert alert-danger">{{ Session('add_e') }}</div>
                @elseif (Session::has('edit'))
                    <div class="alert alert-success">{{ Session('edit') }}</div>
                @elseif(Session::has('edit_e'))
                    <div class="alert alert-danger">{{ Session('edit_e') }}</div>
                @elseif (Session::has('hapus'))
                    <div class="alert alert-success">{{ Session('hapus') }}</div>
                @elseif(Session::has('hapus_e'))
                    <div class="alert alert-danger">{{ Session('hapus_e') }}</div>
                @endif
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
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pelanggans as $pelanggan)
                                <tr>
                                    <td>{{$pelanggan->nik}}</td>
                                    <td>{{$pelanggan->nama}}</td>
                                    <td>{{$pelanggan->jk}}</td>
                                    <td>{{$pelanggan->alamat}}</td>
                                    <td>{{$pelanggan->ttl}}</td>
                                    <td>{{$pelanggan->tlpn}}</td>
                                    <td>{{$pelanggan->email}}</td>
                                    <td><a href="{{route('survey.olah',$pelanggan->id)}}" class="btn btn-primary btn-sm">Pilih</a></td>
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
