@extends('layouts.back_end')
@section('main')
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Proses Pengajuan Kredit</h3>
            </div>
            <!-- /.box-header -->
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        No Kontrak: <b>{{$pelanggan->no_kontrak}}</b><br>
                        Nama: <b>{{$pelanggan->nama}}</b><br>
                    </div>
                    <div class="col-md-6">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>Nama Barang</td>
                                    <td>Nama Vendor</td>
                                    <td>Harga</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$barang->nama}}</td>
                                    <td>{{$vendor->nama}}</td>
                                    <td><span id="harga">{{$barang->harga}}</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>
                <h3>Simulasi Kredit</h3>
                <div class="form-group">
                    <label for="">Lama Cicilan</label>
                    <select name="cicilan" id="cicilan" class="form-control">
                        <option value="5">5 Bulan</option>
                        <option value="10">10 Bulan</option>
                        <option value="12">12 Bulan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Suku Bunga</label>
                        <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio1" name="bunga" class="custom-control-input" value="0" required checked>
                        <label class="custom-control-label" for="customRadio1">Flat</label>
                        </div>
                        <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio2" name="bunga" class="custom-control-input" value="1" required>
                        <label class="custom-control-label" for="customRadio2">Efektif</label>
                        </div>
                </div>
                <button type="button" class="btn btn-primary" id="kalkulasi">Kalkulasi</button>
                <table class="table" id="simulasi_table">
                    <thead>
                        <tr>
                            <td>Bulan</td>
                            <td>Angsuran Bulan</td>
                            <td>Angsuran Pokok</td>
                            <td>Total Angsuran</td>
                            <td>Sisa Pinjaman</td>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>

                </table>
            </div><br>
          </div>
          <!-- /.box -->
        </div>
    </div>
</div>
@endsection
