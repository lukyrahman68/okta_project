@extends('layouts.back_end')
@section('main')
<br>
<div class="container">
    <a href="{{route('survey.create')}}" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add_survey">Tambah</a>
    <div class="modal fade" id="add_survey" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content panel-primary">
            <div class="modal-header panel-heading">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Apakah Anda Yakin?</h4>
            </div>
            <form action="{{route('survey.store')}}" method="post">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Pertanyaan</label>
                    <input type="text" class="form-control" name="pertanyaan" placeholder="Pertanyaan" required>
                </div>
                <div class="form-group">
                    <label for="">Jenis</label>
                    <select name="jenis" id="jenis" class="form-control">
                        <option value="polisi">Polisi</option>
                        <option value="tni">TNI</option>
                        <option value="guru">Guru</option>
                        <option value="swasta">Swasta</option>
                        <option value="wiraswasta">Wiraswasta</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" value="Save">
            </div>
            </form>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
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
              <table class="table table-hover " id="myTable">
                <thead>
                    <tr>
                        <th>Pertanyaan</th>
                        <th>jenis Pekerjaan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($surveys as $survey)
                  <tr>
                      <td>{{$survey->pertanyaan}}</td>
                      <td>{{strtoupper(trans($survey->jenis))}}</td>
                      <td>
                        <a href="" class="btn btn-sm btn-info" data-toggle="modal" data-target="#edit_survey">Edit</a>
                        <a href="#" data-toggle="modal" data-target="#danger_modal_{{$survey->id}}" class="btn btn-sm btn-danger">Hapus</a>
                      </td>
                  </tr>
                  <div class="modal fade" id="edit_survey" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content panel-primary">
                            <div class="modal-header panel-heading">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Edit</h4>
                            </div>
                            <form action="{{route('survey.update',$survey->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="">Pertanyaan</label>
                                    <input type="text" class="form-control" name="pertanyaan" placeholder="Pertanyaan" value="{{$survey->pertanyaan}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Jenis</label>
                                    <select name="jenis" id="jenis" class="form-control">
                                        <option value="polisi" {{($survey->jenis=='polisi')?'selected':''}}>Polisi</option>
                                        <option value="tni" {{($survey->jenis=='tni')?'selected':''}}>TNI</option>
                                        <option value="guru" {{($survey->jenis=='guru')?'selected':''}}>Guru</option>
                                        <option value="swasta" {{($survey->jenis=='swasta')?'selected':''}}>Swasta</option>
                                        <option value="wiraswasta" {{($survey->jenis=='wiraswasta')?'selected':''}}>Wiraswasta</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-primary" value="Save">
                            </div>
                            </form>
                          </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                      </div><!-- /.modal -->
                  <div class="modal fade" id="danger_modal_{{$survey->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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

                          <form action="{{route('survey.destroy',$survey->id)}}" method="POST">
                              {{ method_field('DELETE') }}
                              {{ csrf_field() }}
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <input type="submit" class="btn btn-danger" value="Hapus">
                          </form>
                        </div>
                      </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                  </div><!-- /.modal -->
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
