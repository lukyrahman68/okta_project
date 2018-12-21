<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    //
    protected $fillable = [
        'pelanggan_id',
        'nama',
        'ket'
    ];
}
