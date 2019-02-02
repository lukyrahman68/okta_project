<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    //
    protected $fillable = [
        'pelanggan_id',
        'angsuran_ke',
        'status'
    ];
}
