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
                <input type="text" class="form-control" placeholder="NIK" name="nik" required>
            </div>
            <div class="form-group">
                <label for="Nama">Nama</label>
                <input type="text" class="form-control" placeholder="Nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="Alamat">Alamat</label>
                <input type="text" class="form-control" placeholder="Alamat" name="alamat" required>
            </div>
            <div class="form-group">
                <label for="Alamat">Jenis Kelamin</label>
                <div class="row">
                    <div class="col-md-2">
                        <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio1" name="jk" class="custom-control-input" value="Laki - Laki" required>
                        <label class="custom-control-label" for="customRadio1">Laki - Laki</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio2" name="jk" class="custom-control-input" value="Perempuan" required>
                        <label class="custom-control-label" for="customRadio2">Perempuan</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Date -->
            <div class="form-group">
                    <label>Date:</label>

                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="datepicker" name="ttl" required>
                    </div>
                    <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
            <div class="form-group">
                <label for="Telphone">Telphone</label>
                <input type="text" class="form-control" placeholder="Telphone" name="tlpn" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" placeholder="Email" name="email" required>
            </div>
            <div class="card" style="padding:1em;border:1px solid #eee">
                <div class="card-body">
                    <div class="card-title"> Upload Photo</div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ktp">KTP</label>
                                <input type="file" class="form-control" name="ktp" required>
                            </div>
                            <div class="form-group">
                                <label for="kk">Kartu Keluarga</label>
                                <input type="file" class="form-control" name="kk" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dp">Dokumen Pendukung</label>
                                <input type="file" class="form-control" name="dp[]">
                            </div>
                            <div class="form-group">
                                <label for="dp">Dokumen Pendukung</label>
                                <input type="file" class="form-control" name="dp[]">
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="pull-right">
                <input type="submit" value="Simpan" class="btn btn-sm btn-primary">
            </div>
        </form>
      </div>
    </div>
</div>
</div>

@endsection

