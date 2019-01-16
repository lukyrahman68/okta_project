<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    //
    protected $fillable = [
        'nama',
        'alamat',
        'tlpn',
        'kategori',
    ];
    public function barangs()
    {
        return $this->hasMany('App\barang');
    }
}
