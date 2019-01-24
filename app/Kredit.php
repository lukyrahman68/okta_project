<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kredit extends Model
{
    //
    protected $fillable = [
        'no_kontrak',
        'pelanggan_id',
        'vendor_id',
        'barang_id',
        'sts'
    ];
}
