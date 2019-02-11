@extends('layouts.back_end_pemilik')
@section('main')
<br>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data User</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
            <a href="{{route('karyawan.tambah')}}" class="btn btn-sm btn-primary">Tambah</a><br><br>
            @if(Session::has('berhasil'))
                <br>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Alert!</h4>
                    {{ Session('berhasil') }}
                </div>
            @endif
            <br><br>
              <table class="table table-hover " id="myTable">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Status</th>
                        <!--<th>Gambar</th>-->
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($users as $user)
                  <tr>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->is_owner=='1'?'Owner':'Kasir'}}</td>
                      <!--<td><img src="{{asset('images/users/'.$user->id.'/'.$user->img)}}" alt="" class="img-thumbnail img" id="img" height="100" width="100"></td>-->
                      <td>
                        <a href="{{route('karyawan.edit',$user->id)}}" id="btn_detail" class="btn btn-sm btn-info" ">Edit</a>
                        <a href="#" data-toggle="modal" data-target="#danger_modal_{{$user->id}}" class="btn btn-sm btn-danger">Hapus</a>
                      </td>
                        </tr>
                        <div class="modal fade" id="danger_modal_{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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

                                <form action="{{route('karyawan.destroy',$user->id)}}" method="POST">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-danger" value="Hapus">
                                </form>
                                </div>
                            </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                      </td>
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
