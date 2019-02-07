@extends('layouts.back_end_pelanggan')
@section('main')
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!--<div class="box-header">
              <h3 class="box-title">Proses Peng</h3>
            </div>-->
            <!-- /.box-header -->
            <div class="container">
                <h3>Simulasi Kredit</h3>
                <div class="form-group">
                    <label>Harga : </label>
                    <input type="text" id="m">
                    </div>
                <span id="harga" hidden></span>
                <script>
                function m(){
                    
                }
                </script>
                <input type="hidden" name="kredit_id" id="kredit_id" value="{{--$pelanggan->kredit_id--}}">
                <input type="hidden" name="pelanggan_id" id="pelanggan_id" value="{{--$pelanggan->pelanggan_id--}}">
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
                @csrf
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
                <div id="tgl"></div>
                <!--<a href="#" class="btn btn-primary" id="proses_simpan" style="display: none">Simpan</a>-->
            </div><br>
          </div>
          <!-- /.box -->
        </div>
    </div>
</div>
@endsection
