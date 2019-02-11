@extends('layouts.back_end')
@section('main')
<br>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Notifikasi Jatuh Tempo</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <div class="form-group">
                        <form method="post" action="{{route('notif.cari')}}">
                                @csrf
                                    <div class="col-md-3"style="text-align: right">
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right datepicker" name="date" value="{{@$a}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="submit" value="Cari" class="btn btn-primary">
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
              <h3 class="box-title">Data Pelanggan</h3>
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
                      <td>Centang</td>
                    </tr>
                  </thead>
                  <form action="{{route('notif.kirim')}}" method="POST">
                    @csrf
                  <tbody>
                    @foreach ($kredit as $item)
                        <tr>
                            <td>{{$item->nama}}</td>
                            <td>
                                <input class="form-check-input" type="checkbox" value="{{$item->id}}" id="check" name="check[]">
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                  <input type="submit" value="Kirim" class="btn btn-primary pull-right">
                </form>
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
 {{-- var isi='';
    $('input[name=check]').on('change',function(){
        if(this.checked){

            $('[name=id]').val($(this).val()+',');
        }
    }); --}}
@endsection