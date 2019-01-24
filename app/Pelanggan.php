<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    //
    protected $fillable = [
        'nik',
        'nama',
        'alamat',
        'jk',
        'ttl',
        'tlpn',
        'email',
        'sts',
        'ket-alamat',
        'pekerjaan',
        'nama_toko',
        'alamat_toko',
        'gaji',
    ];
    public function media(){
        return $this->hasMany('App\Media');
    }
}
