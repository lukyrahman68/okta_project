<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $fillable = [
        'nik',
        'nama',
        'alamat',
        'ket_alamat',
        'pekerjaan',
        'nama_toko',
        'alamat_toko',
        'gaji',
        'jk',
        'ttl',
        'tlpn',
        'email',
        'password',
        'sts',
        'img1',
        'img2',
    ];
}
