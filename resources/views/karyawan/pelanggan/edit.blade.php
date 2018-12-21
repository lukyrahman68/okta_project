@extends('layouts.back_end')
@section('main')
<br>
<div class="container">
<div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title" style="font-weight: bold">Responsive Hover Table</h3>
        <form action="{{route('pelanggan.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="NIK">NIK</label>
                <input type="text" class="form-control" placeholder="NIK" name="nik" value="{{$pelanggan->nik}}">
            </div>
            <div class="form-group">
                <label for="Nama">Nama</label>
                <input type="text" class="form-control" placeholder="Nama" name="nama" value="{{$pelanggan->nama}}">
            </div>
            <div class="form-group">
                <label for="Alamat">Alamat</label>
                <input type="text" class="form-control" placeholder="Alamat" name="alamat" value="{{$pelanggan->alamat}}">
            </div>
            <div class="form-group">
                <label for="JK">Jenis Kelamin</label>
                <input type="text" class="form-control" placeholder="Jenis Kelamin" name="jk" value="{{$pelanggan->jk}}">
            </div>
            <div class="form-group">
                <label for="TTL">TTL</label>
                <input type="text" class="form-control" placeholder="TTL" name="ttl" value="{{$pelanggan->ttl}}">
            </div>
            <div class="form-group">
                <label for="Telphone">Telphone</label>
                <input type="text" class="form-control" placeholder="Telphone" name="tlpn" value="{{$pelanggan->tlpn}}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" placeholder="Email" name="email" value="{{$pelanggan->email}}">
            </div>
            <div class="card" style="padding:1em;border:1px solid #eee;">
                <div class="card-body">
                    <div class="card-title"> Upload Photo</div>
                    <a href="#" data-toggle="modal" data-target="#add_img" class="btn btn-primary btn-sm">Tambah</a>
                    <hr>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Jenis</th>
                                <th>Image</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pelanggan->media as $img)
                            <tr>
                                <td><label for="ktp">{{$img->ket}}</td>
                                <td><img class="img-thumbnail" src="{{asset('images/'.$img->pelanggan_id.'/'.$img->nama)}}" alt="" srcset="" style="max-height: 300px;max-width: 150px;"></td>
                                <td><a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit_{{$img->id}}">Ubah</a>
                                    @if ($img->ket=='Dokumen Pendukung' )
                                        <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#danger_modal_{{$img->id}}">Hapus</a></td>
                                    @endif
                            </tr>
                            
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>


            <br>
            <div class="pull-right">
                <input type="submit" value="Simpan" class="btn btn-sm btn-primary">
            </div>
        </form>
      </div>
    </div>
</div>
</div>
@foreach ($pelanggan->media as $img)
<!-- Modal -->
<div class="modal fade" id="edit_{{$img->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Pilih Gambar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form action="{{route('ubah_img',$img->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
                <div class="col-md-12 form-group">
                    <input type="file" class="form-control" name="img">
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Ubah</button>
        </div>
    </form>
    </div>
</div>
</div>
@if ($img->ket=='Dokumen Pendukung' )
    <div class="modal fade" id="danger_modal_{{$img->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <a href="{{route('delete_img',$img->id)}}" class="btn btn-danger">Hapus</a>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endif
@endforeach

<!-- Modal -->
<div class="modal fade" id="add_img" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Pilih Gambar Dokumen Pendukung</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('add_img',$pelanggan->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                        <div class="col-md-12 form-group">
                            <input type="file" class="form-control" name="img">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
            </div>
        </div>
        </div>
@endsection
