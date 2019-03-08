<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<h3 style="text-align:center">WAWA Collection<br>Laporan Pendapatan<br>Periode {{$tgl_awal_show}} sd {{$tgl_akhir_show}}</h3>
<table class="table">
    <thead>
      <tr>
          <td>No Kontrak</td>
        <td>Nama Pelanggan</td>
        {{-- <td>Nama Barang</td>
        <td>Harga Barang</td>
        <td>Angsuran Ke</td>
        <td>Suku Bunga</td>
        <td>Tanggal Bayar</td> --}}
        <td>Total</td>
      </tr>
    </thead>
    <tbody>
      @foreach ($kredit as $item)
          <tr>
            
            <td>{{$item->no_kontrak}}</td>
            <td>{{$item->nama_pelanggan}}</td>
            {{-- <td>{{$item->nama_barang}}</td>
            <td>{{$item->harga}}</td>
            <td>{{$item->angsuran_ke}}</td>
            <td>{{$item->suku_bunga=='0'?'Flat':'Efektif'}}</td>
            <td>{{$item->tgl}}</td> --}}
            <td>{{$item->pendapatan}}</td>
          </tr>
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <td colspan="2" style="text-align: center">Total</td>
        <td>{{$total}}</td>
      </tr>
    </tfoot>
  </table>