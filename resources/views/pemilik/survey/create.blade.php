@extends('layouts.back_end_pemilik')
@section('main')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                <h3 class="box-title">Upload Survey</h3>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ktp">Foto Pelanggan</label>
                            <input type="file" class="form-control" name="ktp" required>
                        </div>
                        <div class="form-group">
                            <label for="kk">Foto Rumah</label>
                            <input type="file" class="form-control" name="kk" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="dp">Foto Tempat Usaha</label>
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
        </div>
    </div>
</div>
@endsection
