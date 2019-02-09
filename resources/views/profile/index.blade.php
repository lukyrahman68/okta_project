@extends(Auth::user()->is_owner=='0'?'layouts.back_end':'layouts.back_end_pemilik')
@section('main')
<br>
<div class="container">
    <br>
    <br>
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Profile User</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
            <form action="{{route('profile.update', $user->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" value="{{$user->name}}" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" value="{{$user->email}}" class="form-control" name="email">
                </div>
                <div class="form-group">
                    <label for="">Gambar</label>
                    <input type="file" class="form-control" name="img">
                </div>
                <input type="submit" class="btn btn-primary" value="Update">
            </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </div>
</div>

@endsection
