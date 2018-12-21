<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    //
    protected $fillable = [
        'vendor_id',
        'nama',
        'harga'
    ];
    public function vendor(){
        return $this->belongsTo('App\Vendor');
    }
}
