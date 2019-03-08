@extends('layouts.back_end_pemilik')
@section('main')
<br>
<style>
#fixedbutton {
    position: fixed;
    bottom: 80px;
    right: 50px; 
    border-radius: 27px;
    padding: 20px;
}
</style>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Laporan Pembayaran</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <div class="form-group">
                        <form method="post" action="{{route('proseslaporan.pembayaran')}}">
                                @csrf
                                    <div class="col-md-3"style="text-align: right">
                                        <label for="" >Dari</label>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="date" class="form-control pull-right datepicker" name="awal" value="{{@$a}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-1" style="text-align: center">SD</div>
                                    <div class="col-md-2">
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="date" class="form-control pull-right datepicker" name="akhir" value="{{@$b}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="submit" value="Filter" class="btn btn-primary">
                                    </div>
                                    </form>
                </div><br><br>
                <div class="box-body">
            </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          @if ($status == 'lanjut')
          <div class="box">
            <div class="box-header with-border">
              <i class="fa fa-bar-chart-o"></i>
              <h3 class="box-title">Laporan Pembayaran</h3>
              {{-- @isset($kredit)
                @foreach($kredit as $kredit)
                {{unserialize($kredit->cicilan)}}
                @endforeach
              @endisset --}}
            </div>
            <div class="box-body">
              {{-- <div id="bar-chart" style="height: 300px;"></div> --}}
                <table class="table">
                  <thead>
                    <tr>
                      <td>Nama Pelanggan</td>
                      <td>No Kontrak</td>
                      <td>Nama Barang</td>
                      <td>Harga Barang</td>
                      <td>Angsuran Ke</td>
                      <td>Suku Bunga</td>
                      <td>Tanggal Bayar</td>
                      <td>Total</td>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($kredit as $item)
                        <tr>
                          <td>{{$item->nama_pelanggan}}</td>
                          <td>{{$item->no_kontrak}}</td>
                          <td>{{$item->nama_barang}}</td>
                          <td>{{$item->harga}}</td>
                          <td>{{$item->angsuran_ke}}</td>
                          <td>{{$item->suku_bunga=='0'?'Flat':'Efektif'}}</td>
                          <td>{{$item->tgl}}</td>
                          <td>{{$item->pendapatan}}</td>
                        </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="7" style="text-align: center">Total</td>
                      <td>{{$total}}</td>
                    </tr>
                  </tfoot>
                </table>
            </div>
            <!-- /.box-body-->
          </div>
          @endif
        </div>
        <a target="_blank" href="{{route('pembayaran.cetak', [date('Y-m-d', strtotime(@$a)), date('Y-m-d', strtotime(@$b))])}}" class="btn btn-primary" id="fixedbutton"><i class="fa fa-print fa-2x"></i></a>
    </div>
</div>
@endsection
