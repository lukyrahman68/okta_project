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
              <h3 class="box-title">Data Pelanggan</h3>
            </div>
            <!-- /.box-header -->
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
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </div>
    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Pertanyaan</h3>
            </div>
            <!-- /.box-header -->
            <form action="{{route('survey.simpan')}}" method="post">
                @csrf
                <input type="hidden" value="{{$pelanggan->id}}" name="pelanggan_id">
            <div class="box-body table-responsive">
                @foreach ($surveys as $survey)
                <div class="form-group">
                    <label for="">{{$survey->pertanyaan}}</label>
                    <input type="text" class="form-control" name="pertanyaan[]" required>
                    <input type="hidden" value="{{$survey->id}}" name="survey_id[]">
                </div>
                @endforeach
                <input type="submit" class="btn btn-primary" value="Simpan">
            </div>
            </form>
    </div>
</div>
@endsection
