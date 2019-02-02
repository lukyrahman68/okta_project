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
                </div><br><br>
                <table class="table">
                    <thead>
                        <tr>
                            <td>asd</td>
                            <td>asdasd</td>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </div>
</div>
@endsection
