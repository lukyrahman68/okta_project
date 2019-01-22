@extends('layouts.back_end_pemilik')
@section('main')
<br>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Responsive Hover Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table class="table table-hover " id="myTable">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Telphone</th>
                        <th>Vendor</th>
                        <th>Barang</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($kredits as $kredit)
                  <tr>
                      <td>{{$kredit->nama}}</td>
                      <td>{{$kredit->jk}}</td>
                      <td>{{$kredit->alamat}}</td>
                      <td>{{$kredit->tlpn}}</td>
                      <td>{{$kredit->vendor_nama}}</td>
                      <td>{{$kredit->nama_brng}}</td>
                      <td>{{$kredit->harga}}</td>
                      <td>
                        <a href="{{route('survey.bukti_survey',$kredit->id)}}" class="btn btn-primary">Cek</a>
                      </td>
                  </tr>
                  {{-- <div class="modal fade" id="danger_modal_{{$kredit->kredit_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                  <div class="modal fade" id="info_modal_{{$kredit->kredit_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content panel-info">
                        <div class="modal-header panel-heading">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Apakah Anda Yakin?</h4>
                        </div>
                        <div class="modal-body" style="text-align: center">
                          Anda yakin akan meng-approve permintaan kredit atas nama {{$kredit->nama}} ?
                        </div>
                        <div class="modal-footer">

                          <form action="{{route('approve.update',$kredit->kredit_id)}}" method="POST">
                              {{ method_field('PUT') }}
                              {{ csrf_field() }}
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <input type="submit" class="btn btn-primary" value="Approve">
                          </form>
                        </div>
                      </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                  </div><!-- /.modal --> --}}
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
