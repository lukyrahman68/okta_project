@extends('layouts.back_end_pelanggan')
@section('main')
<br>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Informasi Kredit</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
            @foreach($kredit as $kredit)
              <div class="form-group">
                <label>No Kontrak : </label>{{$kredit->no_kontrak}}
              </div>
              <div class="form-group">
                <label>Nama : </label>{{$kredit->nama}}
              </div>
              <div class="form-group">
                <label>Nama Barang : </label>{{$kredit->a}}
              </div>
              <div class="form-group">
                <label>Harga : </label>{{$kredit->harga}}
              </div>
              <div class="form-group">
                <label>Tenor : </label>{{$kredit->lama_cicilan}} Bulan
              </div>
              <div class="form-group">
                <label>Suku Bunga : </label> {{($kredit->suku_bunga=='0')?'Flat':'Efective'}}
              </div>
            @endforeach
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </div>
</div>

@endsection
