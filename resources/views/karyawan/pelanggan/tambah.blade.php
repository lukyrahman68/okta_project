@extends('layouts.back_end')
@section('main')
<br>
<div class="container">
<div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title" style="font-weight: bold">Responsive Hover Table</h3>
            <div class="form-group">
                <label for="NIK">NIK</label>
                <input type="text" class="form-control" placeholder="NIK">
            </div>
            <div class="form-group">
                <label for="Nama">Nama</label>
                <input type="text" class="form-control" placeholder="Nama">
            </div>
            <div class="form-group">
                <label for="Alamat">Alamat</label>
                <input type="text" class="form-control" placeholder="Alamat">
            </div>
            <div class="form-group">
                <label for="JK">Jenis Kelamin</label>
                <input type="text" class="form-control" placeholder="Jenis Kelamin">
            </div>
            <div class="form-group">
                <label for="TTL">TTL</label>
                <input type="text" class="form-control" placeholder="TTL">
            </div>
            <div class="form-group">
                <label for="Telphone">Telphone</label>
                <input type="text" class="form-control" placeholder="Telphone">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" placeholder="Email">
            </div>
      </div>
    </div>
</div>

@endsection