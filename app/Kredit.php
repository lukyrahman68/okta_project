<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kredit extends Model
{
    //
    protected $fillable = [
        'pelanggan_id',
        'barang_id',
        'sts'
    ];
}
