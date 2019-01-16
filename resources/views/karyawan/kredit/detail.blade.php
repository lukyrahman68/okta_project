@extends('layouts.back_end')
@section('main')
<br>
<div class="container">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Detail</h3>
            </div>
            <div class="box-body table-responsive">
              <table class="table table-hover ">
                <thead>
                    <tr>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Tempat Tanggal Lahir</th>
                        <th>Telphone</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                  <tr>
                      <td>{{$pelanggan->nik}}</td>
                      <td>{{$pelanggan->nama}}</td>
                      <td>{{$pelanggan->jk}}</td>
                      <td>{{$pelanggan->alamat}}</td>
                      <td>{{$pelanggan->ttl}}</td>
                      <td>{{$pelanggan->tlpn}}</td>
                      <td>{{$pelanggan->email}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Pilih Vendor</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select name="kategori" id="kategori" class="form-control">
                        <option value="" disabled selected>Pilih Kategori</option>
                        <option value="Elektronik" >Elektronik</option>
                        <option value="Ponsel" >Ponsel</option>
                        <option value="Helm" >Helm</option>
                        <option value="Ban" >Ban</option>
                        <option value="Mebel" >Mebel</option>
                        <option value="Other" >Other</option>
                    </select>
                </div>
                <button type="button" class="btn btn-primary" id="cari" name="cari">Pilih</button>

            </div>

            <div class="box-body">
                {{-- <form action="{{route('kredit.create')}}" method="POST"> --}}
                    @csrf
                    <input type="text" value="{{$pelanggan->id}}" name="pelanggan_id">
                    <input type="text" id="barang_id">
                    <button id="button">btn</button>
                    <table class="display" id="table_cari">
                        <thead>
                            <tr>
                                <td>Id</td>
                                <td>Nama Barang</td>
                                <td>Nama Vendor</td>
                                <td>Harga</td>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                {{-- </form> --}}
            </div>
        </div>
    </div>
</div>
@endsection
{{-- @section('script')
    <script>
    $(document).ready( function () {
        $('#myTable').DataTable();
        $(document).on('click','#cari',function (e){
            $('.body2').remove();
            $.ajax({
                type: 'post',
                url: '/kredit/cari',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'kategori': $('#kategori').find(":selected").text();
                },
                success: function(data) {
                    if ((data.errors)){
                    $('.error').removeClass('hidden');
                        $('.error').text(data.errors.name);
                    }
                    else {
                        $('.error').addClass('hidden');

                        // var div = document.getElementById('body');
                        // div.innerHTML += '<hr><div class="body2"><div class="form-group"><label>Nama Vendor</label><input type="text" class="form-control" placeholder="Nama Vendor" name="nama" value="'+data[0].nama+'"></div><div class="form-group"><label>Alamat</label><input type="text" class="form-control" placeholder="Alamat" name="alamat" value="'+data[0].alamat+'"></div><div class="form-group"><label>No Telphone</label><input type="text" class="form-control" placeholder="No Telphone" name="tlpn" value="'+data[0].tlpn+'"></div><div class="form-group"><label>Barang</label><select class="form-control" id="barang" name="barang"></select></div><div class="form-group"><label>Harga</label><input type="text" class="form-control" placeholder="Harga" name="harga" value="'+data[0].harga+'"></div><div class="form-group"><input type="submit" class="btn btn-primary proses" value="Proses" name="simpan" data-id="' + data[0].id + '" data-name="' + data[0].nama + '"></div></div>';

                        // $.each(data[1], function(index, item) {
                        //     $('#barang').append("<option value='"+ item.id +"'>"+item.nama+"</option>");
                        // });
                    }
                },
            });
            $('#name').val('');
        });
        $(document).on('click', '.proses', function(){
            alert('oke lur');
            $.ajax({
                type: 'get',
                url: '/kredit/create',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'pelanggan_id': $('input[name=pelanggan_id]').val(),
                    'barang_id': $('select[name=barang] option:selected').val()
                },
                success: function(data) {
                    if ((data.errors)){
                    $('.error').removeClass('hidden');
                        $('.error').text(data.errors.name);
                    }
                    else {
                        $('.error').addClass('hidden');
                        window.location.href = "{{route('kredit.index')}}";

                    }
                },
            });
        });
    });
</script>
@endsection --}}
