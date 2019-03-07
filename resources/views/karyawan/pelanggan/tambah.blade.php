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
                <input type="text" class="form-control" placeholder="NIK" name="nik" onkeypress="return isNumber(event)" required>
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
                <label for="Alamat">Keterangan Alamat</label>
                <input type="text" class="form-control" placeholder="Keterangan Alamat" name="ket_alamat" required>
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
            <div id="form-pekerjaan">
                <div class="form-group">
                    <label for="Alamat">Pekerjaan</label>
                    <select name="pekerjaan" id="pekerjaan" class="form-control">
                        <option value="" disabled>Pilih Pekerjaan</option>
                        <option value="Polisi">Polisi</option>
                        <option value="TNI">TNI</option>
                        <option value="Guru">Guru</option>
                        <option value="Swasta">Swasta</option>
                        <option value="Wiraswasta">Wiraswasta</option>
                        <option value="other">other</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="Alamat">Gaji</label>
                <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio1" name="gaji" class="custom-control-input" value="Rp. 0 - Rp. 500.000" required>
                        <label class="custom-control-label" for="customRadio1">Rp. 0 - Rp. 500.000</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio2" name="gaji" class="custom-control-input" value="Rp. 500.000 - Rp. 1.000.000" required>
                        <label class="custom-control-label" for="customRadio2">Rp. 500.000 - Rp. 1.000.000</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio1" name="gaji" class="custom-control-input" value="Rp. 1.000.000 - Rp. 1.500.000" required>
                        <label class="custom-control-label" for="customRadio1">Rp. 1.000.000 - Rp. 1.500.000</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio2" name="gaji" class="custom-control-input" value="Rp. 1.500.000 - Rp. 2.000.000"  required>
                        <label class="custom-control-label" for="customRadio2">Rp. 1.500.000 - Rp. 2.000.000</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio2" name="gaji" class="custom-control-input" value="Rp. 2.000.000 - Rp. 2.500.000" required>
                        <label class="custom-control-label" for="customRadio2">Rp. 2.000.000 - Rp. 2.500.000</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio2" name="gaji" class="custom-control-input" value="Rp. 2.500.000 - Rp. 3.000.000" required>
                        <label class="custom-control-label" for="customRadio2">Rp. 2.500.000 - Rp. 3.000.000</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio2" name="gaji" class="custom-control-input" value="Rp. 3.000.000 - Rp. 3.500.000" required>
                        <label class="custom-control-label" for="customRadio2">Rp. 3.000.000 - Rp. 3.500.000</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio2" name="gaji" class="custom-control-input" value="Rp. 3.500.000 - Rp. 4.000.000" required>
                        <label class="custom-control-label" for="customRadio2">Rp. 3.500.000 - Rp. 4.000.000</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio2" name="gaji" class="custom-control-input" value="Rp. 4.000.000 - Rp. 4.500.000" required>
                        <label class="custom-control-label" for="customRadio2">Rp. 4.000.000 - Rp. 4.500.000</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio2" name="gaji" class="custom-control-input" value="Rp. 4.500.000 - Rp. 5.000.000" required>
                        <label class="custom-control-label" for="customRadio2">Rp. 4.500.000 - Rp. 5.000.000</label>
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
                <input type="text" class="form-control" placeholder="Telphone" name="tlpn" onkeypress="return isNumber(event)" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" placeholder="Email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Password" name="password" required>
            </div>
            <div class="form-group">
                <label for="email">No Tephone Keluarga</label>
                <input type="text" class="form-control" placeholder="No Telphone" name="tlpn_keluarga" onkeypress="return isNumber(event)" required>
                <label for="email">No Tephone Keluarga 2</label>
                <input type="text" class="form-control" placeholder="No Telphone" name="tlpn_keluarga2" onkeypress="return isNumber(event)" required>
            </div>
            <div class="card" style="padding:1em;border:1px solid #eee">
                <div class="card-body">
                    <div class="card-title"> Upload Photo</div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="ktp">KTP</label>
                                <input type="file" class="form-control" name="ktp" required>
                            </div>
                            <div class="form-group">
                                <label for="kk">Kartu Keluarga</label>
                                <input type="file" class="form-control" name="kk" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="ktp">Pas Photo</label>
                                <input type="file" class="form-control" name="photo" required>
                            </div>
                            <div class="form-group">
                                <label for="dp">Dokumen Pendukung</label>
                                <input type="file" class="form-control" name="dp[]">
                            </div>
                        </div>
                        <div class="col-md-3">
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

