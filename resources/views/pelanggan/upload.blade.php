@extends('layouts.back_end_pelanggan')
@section('main')
<br>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Upload data pembayaran</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <form method="post" action="{{ route('uploadberkaspembayaran') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="upload1">Foto struk</label>
                    <input type="file" class="form-control" name="upload1" required>
                </div>
                <div class="form-group">
                    <label for="upload2">Foto selfi dengan struk</label>
                    <input type="file" class="form-control" name="upload2" required>
                </div>
                <div class="form-group">
                    <input type="submit"  name="kirim" value="Kirim">
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
