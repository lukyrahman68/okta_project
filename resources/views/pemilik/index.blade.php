@extends('layouts.back_end_pemilik')
@section('main')
<br>

<div class="container">
        {{-- <img src="{{asset('images/1/1548141726KTP.JPG')}}" alt=""> --}}
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
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Telphone</th>
                        <th>Vendor</th>
                        <th>Barang</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($kredits as $kredit)
                  <tr>
                      <td>{{$kredit->nama}}</td>
                      <td>{{$kredit->jk}}</td>
                      <td>{{$kredit->alamat}}</td>
                      <td>{{$kredit->tlpn}}</td>
                      <td>{{$kredit->vendor_nama}}</td>
                      <td>{{$kredit->nama_brng}}</td>
                      <td>{{$kredit->harga}}</td>
                      <td>
                        <a href="{{route('approve.detail',$kredit->kredit_id)}}" id="btn_detail" value="{{$kredit->id}}" class="btn btn-sm btn-info" ">Detail</a>

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
