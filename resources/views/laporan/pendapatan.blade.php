@extends('layouts.back_end_pemilik')
@section('main')
<br>

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
                <form method="post" action="{{route('proseslaporan.pendapatan')}}">
                @csrf
                    <div class="col-md-3"style="text-align: right">
                        <label for="" >Dari</label>
                    </div>
                    <div class="col-md-2">
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right datepicker" name="awal" required>
                        </div>
                    </div>
                    <div class="col-md-1" style="text-align: center">SD</div>
                    <div class="col-md-2">
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right datepicker" name="akhir" required>
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
              <h3 class="box-title">Laporan Keuntungan</h3>
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
    </div>
</div>
@endsection
@section('js')
<!-- FLOT CHARTS -->
<script src="{{asset('bower_components/Flot/jquery.flot.js')}}"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="{{asset('bower_components/Flot/jquery.flot.resize.js')}}"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="{{asset('bower_components/Flot/jquery.flot.pie.js')}}"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="{{asset('bower_components/Flot/jquery.flot.categories.js')}}"></script>
<!-- Page script -->
<script>
  $(function () {
    var bar_data = {
      data : [['January', 10], ['February', 8], ['March', 4], ['April', 13], ['May', 17], ['June', 9]],
      color: '#3c8dbc'
    }
    $.plot('#bar-chart', [bar_data], {
      grid  : {
        borderWidth: 1,
        borderColor: '#f3f3f3',
        tickColor  : '#f3f3f3'
      },
      series: {
        bars: {
          show    : true,
          barWidth: 0.5,
          align   : 'center'
        }
      },
      xaxis : {
        mode      : 'categories',
        tickLength: 0
      }
    })
    /* END BAR CHART */
    /*
     * END DONUT CHART
     */

  })
  /*
   * Custom Label formatter
   * ----------------------
   */
  function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
      + label
      + '<br>'
      + Math.round(series.percent) + '%</div>'
  }
</script>
@endsection