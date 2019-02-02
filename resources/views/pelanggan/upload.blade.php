@extends('layouts.back_end_pelanggan')
@section('main')
<br>
<div class="container">
    <a href="{{route('pelanggan.create')}}" class="btn btn-sm btn-primary">Tambah</a>
    <br>
    <br>
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Upload data pembayaran</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <form method="post" action="{{ route('uploadpembayaran') }}" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="upload1">KTP</label>
                    <input type="file" class="form-control" name="ktp" required>
                </div>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </div>
</div>

@endsection
