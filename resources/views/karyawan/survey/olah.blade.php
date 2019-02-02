@extends('layouts.back_end')
@section('main')
<br>
<div class="container">
    <br>
    <br>
    <div class="row">
        <div class="col-xs-12">
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal_add">Tambah</a><br><br>
            <!-- Modal -->
            <div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="{{route('survey.simpan')}}" method="post">
                  <div class="modal-body">
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
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </form>
                </div>
              </div>
            </div>
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
              <h3 class="box-title">Data Survey</h3>
            </div>
            <!-- /.box-header -->
            <table class="table">
                <thead>
                    <tr>
                        <td>Pertanyaan</td>
                        <td>Jawaban</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hasilSurveys as $hasilSurvey)
                        <tr>
                            <td>{{$hasilSurvey->pertanyaan}}</td>
                            <td>{{$hasilSurvey->jawaban}}</td>
                            
                            <td><a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_edit{{$hasilSurvey->id}}">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal_delete{{$hasilSurvey->id}}">Delete</a></td>
                                <!-- Modal -->
                                <div class="modal fade" id="modal_edit{{$hasilSurvey->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Jawaban</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <form action="{{route('survey.edit_hasil', $hasilSurvey->id)}}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="">Jawaban</label>
                                                    <input type="text" class="form-control" name="jawaban" value="{{$hasilSurvey->jawaban}}">
                                                </div>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                <!-- Modal -->
                                <div class="modal fade" id="modal_delete{{$hasilSurvey->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content panel-warning">
                                      <div class="modal-header panel-heading">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Apakah Anda Yakin?</h4>
                                      </div>
                                      <div class="modal-body" style="text-align: center">
                                        <img src="{{asset('images/alert/danger.png')}}" alt="">
                                      </div>
                                      <div class="modal-footer">
                                        <form action="{{route('survey.hapus_hasil',$hasilSurvey->id)}}" method="POST">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <input type="submit" class="btn btn-danger" value="Hapus">
                                        </form>
                                      </div>
                                    </div><!-- /.modal-content -->
                                  </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
</div>
@endsection
