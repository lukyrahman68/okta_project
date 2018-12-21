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
                      <td>
                        <a href="{{route('pelanggan.edit',$pelanggan->id)}}" class="btn btn-sm btn-info">Edit</a>
                        <a href="#" data-toggle="modal" data-target="#danger_modal_{{$pelanggan->id}}" class="btn btn-sm btn-danger">Hapus</a>
                      </td>
                  </tr>
                  <div class="modal fade" id="danger_modal_{{$pelanggan->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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

                          <form action="{{route('pelanggan.destroy',$pelanggan->id)}}" method="POST">
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
