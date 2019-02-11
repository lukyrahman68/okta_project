<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<h3 style="text-align:center">WAWA Collection<br>Laporan Piutang<br>Periode {{$tgl_awal_show}} sd {{$tgl_akhir_show}}</h3>
<div class="container-fluid">
<table class="table">
                <thead>
                  <tr>
                    <td>Nama Pelanggan</td>
                    <td>No Kontrak</td>
                    <td>Nama Barang</td>
                    <td>Harga Barang</td>
                    <td>Total Angsuran</td>
                    <td>Jumlah Angsuran</td>
                    <td>Suku Bunga</td>
                    <td>Tanggal Bayar</td>
                    <td>Total Telah Dibayar</td>
                    <td>Sisa Harus Dibayar</td>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($kredit as $item)
                      <tr>
                        <td>{{$item->nama}}</td>
                        <td>{{$item->no_kontrak}}</td>
                        <td>{{$item->nama_barang}}</td>
                        <td>{{$item->harga}}</td>
                        <td>{{$item->total_angsuran}}</td>
                        <td>{{$item->lama_cicilan}}</td>
                        <td>{{$item->suku_bunga=='0'?'Flat':'Efektif'}}</td>
                        <td>{{$item->tgl}}</td>
                        <td>{{$item->pendapatan}}</td>
                        <td>{{$item->total_kredit-$item->pendapatan}}</td>
                      </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="9" style="text-align: center">Total</td>
                    <td>{{$total}}</td>
                  </tr>
                </tfoot>
              </table>
              </div>