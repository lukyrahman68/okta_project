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
                <h2>History</h2>
                <table class="table" style="padding: 10em;">
                    <thead>
                        <tr>
                            <th>Pertanyaan</th>
                            <th>Jawaban</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($surveys)>0)
                            @foreach ($surveys as $survey)
                            <tr>
                                <td>{{$survey->pertanyaan}}</td>
                                <td>{{$survey->jawaban}}</td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="2" style="text-align: center"> <h3>Data Survey Kosong</h3></td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                <br>
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Total Cicilan</th>
                            <th>Angsuran Ke-</th>
                            <th>Jatuh Tempo Setiap Tanggal</th></th>
                            <th>Tanggal Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($histories as $history)
                            <tr>
                                <td>{{$history->nama}}</td>
                                <td>{{$history->harga}}</td>
                                <td>{{$history->cicilan}}</td>
                                <td>{{$history->angsuran_ke}}</td>
                                <td>{{$history->jatuh_tempo}}</td>
                                <td>{{$history->created_at}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table><br>
                    <form action="{{route('approve.update',$kredit->kredit_id)}}" method="POST" >
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-primary pull-right" value="Approve" style="margin-left: 10px;" {{(count($surveys)>0)?'':'disabled'}}>
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
