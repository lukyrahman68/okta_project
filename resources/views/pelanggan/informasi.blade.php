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
            <div class="box-body table-responsive" style="padding:2em;">
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
            <table class="table">
                <thead>
                    <th>Bulan</th>
                    <th>Angsuran Bunga</th>
                    <th>Angsuran Pokok</th>
                    <th>Total Angsuran</th>
                    <th>Sisa Pinjaman</th>
                </thead>
                <tbody>
                    <?php $idx=0 ?>
                    @for ($idx = 0; $idx < sizeof($cicilan); $idx++)
                        <tr>
                            <td>{{$idx+1}}</td>
                            <td>{{$cicilan[$idx]}}</td>
                            <td>{{$angsuran_pokok}}</td>
                            <td>{{$total_angsuran[$idx]}}</td>
                            <td>{{$sisa_pinjaman[$idx]}}</td>
                        </tr>
                    @endfor
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
