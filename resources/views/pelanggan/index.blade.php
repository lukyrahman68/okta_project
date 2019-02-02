@extends('layouts.back_end_pelanggan')
@section('main')
<br>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Informasi Pembayaran</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
            
              <table class="table table-hover" id="myTable">
                <thead>
                    <tr>
                        <th>Tenor</th>
                        <th>Telah Dibayar</th>
                        <th>Sisa Cicilan</th>
                    </tr>
                </thead>
                <tbody>
                    
                  <tr>
                        @foreach ($tenor as $tenor)
                      <td>{{$tenor->lama_cicilan}} Bulan</td>
                      @if($status==0)
                          <td>0</td><td>{{$tenor->lama_cicilan}} Bulan</td>
                          @else
                          <td>{{ $hitung }} Bulan</td><td>{!! $tenor->lama_cicilan-$hitung !!} Bulan</td>
                      @endif
                      @endforeach
                      
                  </tr>
                  
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
