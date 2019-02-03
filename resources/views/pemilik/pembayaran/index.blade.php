@extends('layouts.back_end_pemilik')
@section('main')
<br>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Responsive Hover Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">

              <table class="table table-hover " id="myTable">
                <thead>
                    <tr>
                        <th>Nama Pelanggan</th>
                        <th>Nama Vendor</th>
                        <th>Nama Barang</th>
                        <th>Angsuran Ke</th>
                        <th>Struk</th>
                        <th>Struk Dengan Pelanggan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($pembayarans as $pembayaran)
                  <tr>
                      <td>{{$pembayaran->nama_pelanggan}}</td>
                      <td>{{$pembayaran->nama_vendor}}</td>
                      <td>{{$pembayaran->nama_barang}}</td>
                      <td>{{$pembayaran->angsuran_ke}}</td>
                      <td><img src="{{asset('struk/'.$pembayaran->pelanggan_id.'/'.$pembayaran->pelanggan_id.'-'.$pembayaran->angsuran_ke.'.jpeg')}}" alt="" class="img img-thumbnail" style="height: 100px;width: 100px;"></td>
                      <td><img src="{{asset('selfi/'.$pembayaran->pelanggan_id.'/'.$pembayaran->pelanggan_id.'-'.$pembayaran->angsuran_ke.'.jpeg')}}" alt="" class="img img-thumbnail" style="height: 100px;width: 100px;"></td>
                      <td>
                        <a href="{{route('pembayaran.approve', $pembayaran->id)}}" id="btn_detail" class="btn btn-sm btn-primary" ">Terima</a>
                        <a href="#" id="btn_detail" class="btn btn-sm btn-danger" ">Tolak</a>

                      </td>
                  </tr> 
                  @endforeach
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
