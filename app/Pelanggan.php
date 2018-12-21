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
        'email'
    ];
    public function media(){
        return $this->hasMany('App\Media');
    }
}
