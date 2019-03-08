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
                        <input type="hidden" name="kredit_id" id="kredit_id" value="{{$pelanggan->kredit_id}}">
                        <input type="hidden" name="pelanggan_id" id="pelanggan_id" value="{{$pelanggan->pelanggan_id}}">
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
                <a href="#" class="btn btn-primary" id="proses_simpan" style="display: none">Simpan</a><br>
                <a href="#" class="btn btn-info" id="cmd" style="display: none">PDF</a>
            </div><br>
          </div>
          <!-- /.box -->
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    // var doc = new jsPDF();
    // var specialElementHandlers = {
    //     '#editor': function (element, renderer) {
    //         return true;
    //     }
    // };

    // $('#cmd').click(function () {
    //     doc.fromHTML($('#simulasi_table').get(0), 15, 15, {
    //         'width': 170,
    //             'elementHandlers': specialElementHandlers
    //     });
    //     doc.save('sample-file.pdf');
    // });
    var doc = new jsPDF();
    var specialElementHandlers = {
        '#editor': function (element, renderer) {
            return true;
        }
    };

   $('#cmd').click(function () {

        var table = tableToJson($('#simulasi_table').get(0))
        var doc = new jsPDF('l','pt', 'a4', true);
        doc.cellInitialize();
        $.each(table, function (i, row){
            console.debug(row);
            $.each(row, function (j, cell){
                doc.cell(120, 50,120, 50, cell, i);  // 2nd parameter=top margin,1st=left margin 3rd=row cell width 4th=Row height
            })
        })


        doc.save('sample-file.pdf');
    });
    function tableToJson(table) {
    var data = [];

    // first row needs to be headers
    var headers = [];
    for (var i=0; i<table.rows[0].cells.length; i++) {
        headers[i] = table.rows[0].cells[i].innerHTML.toLowerCase().replace(/ /gi,'');
    }


    // go through cells
    for (var i=0; i<table.rows.length; i++) {

        var tableRow = table.rows[i];
        var rowData = {};

        for (var j=0; j<tableRow.cells.length; j++) {

            rowData[ headers[j] ] = tableRow.cells[j].innerHTML;

        }

        data.push(rowData);
    }

    return data;
}
</script>

@endsection

