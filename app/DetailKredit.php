<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailKredit extends Model
{
    //
    protected $fillable = [
        'kredit_id',
        'lama_cicilan',
        'suku_bunga',
        'cicilan',
        'jatuh_tempo',
    ];
    protected $table = 'kredit_details';
}
