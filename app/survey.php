<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Kredit;
class survey extends Model
{
    //
    protected $fillable = [
        'pertanyaan',
        'jenis',
    ];
}
