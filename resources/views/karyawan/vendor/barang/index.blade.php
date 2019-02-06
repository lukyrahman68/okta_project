@extends('layouts.back_end')
@section('main')
<br>
<div class="container">
    <a href="{{route('barang.create')}}" class="btn btn-sm btn-primary">Tambah</a>
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
            @if(\Session::has('alert'))
                <div class="alert alert-success">
                    <div>{{Session::get('alert')}}</div>
                </div>
            @endif
              <table class="table table-hover " id="myTable">
                <thead>
                    <tr>
                        <th>Nama Vendor</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($barangs as $barang)
                  <tr>
                      <td>{{$barang->vendor->nama}}</td>
                      <td>{{$barang->nama}}</td>
                      <td>{{$barang->harga}}</td>
                      <td>
                        <a href="{{route('barang.edit',$barang->id)}}" class="btn btn-sm btn-info">Edit</a>
                        <a href="#" data-toggle="modal" data-target="#danger_modal_{{$barang->id}}" class="btn btn-sm btn-danger">Hapus</a>
                      </td>
                  </tr>
                  <div class="modal fade" id="danger_modal_{{$barang->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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

                          <form action="{{route('barang.destroy',$barang->id)}}" method="POST">
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
