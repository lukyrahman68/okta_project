@extends('layouts.back_end_pemilik')
@section('main')
<br>

<div class="container">
        {{-- <img src="{{asset('images/1/1548141726KTP.JPG')}}" alt=""> --}}
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Responsive Hover Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <input type="hidden" value="{{$kredit->id}}" id="id_pelanggan">
                NIK <b>{{$kredit->nik}}</b><br>
                Nama <b>{{$kredit->nama}}</b><br>
                Alamat <b>{{$kredit->alamat}}</b><br>
                Keterangan Alamat <b>{{$kredit->ket_alamat}}</b><br>
                Pekerjaan <b>{{$kredit->pekerjaan}}</b><br>
                Nama Toko <b>{{$kredit->nama_toko}}</b><br>
                Alamat Toko <b>{{$kredit->alamat_toko}}</b><br>
                Gaji <b>{{$kredit->gaji}}</b><br>
                Jenis Kelamin <b>{{$kredit->jk}}</b><br>
                Tempat Tanggal Lahir <b>{{$kredit->ttl}}</b><br>
                No Telphone <b>{{$kredit->tlpn}}</b><br>
                Email <b>{{$kredit->email}}</b><br><br><br>
                <div id="media" class="col-md-12">
                      {{-- <div id="add_media"></div> --}}
                </div><br><br>
                <hr><br><br>
                <table class="table" style="padding: 10em;">
                    <thead>
                        <tr>
                            <th>Pertanyaan</th>
                            <th>Jawaban</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($surveys as $survey)
                        <tr>
                            <td>{{$survey->pertanyaan}}</td>
                            <td>{{$survey->jawaban}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                    <form action="{{route('approve.update',$kredit->kredit_id)}}" method="POST" >
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-primary pull-right" value="Approve" style="margin-left: 10px;">
                    </form>
                    <a href="#" data-toggle="modal" data-target="#danger_modal" class="btn btn-danger pull-right">Tolak</a>





                    <div class="modal fade" id="danger_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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

                                  <form action="{{route('approve.destroy',$kredit->kredit_id)}}" method="POST">
                                      {{ method_field('DELETE') }}
                                      {{ csrf_field() }}
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                      <input type="submit" class="btn btn-danger" value="Tolak">
                                  </form>
                                </div>
                              </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                          </div><!-- /.modal -->

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </div>
</div>
@endsection
