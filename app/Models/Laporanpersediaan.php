<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporanpersediaan extends Model
{
    use HasFactory;
    protected $primaryKey = 'kodebarang';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'kodebarang',
        'namabarang',
        'tglmasuk',
        'jmlmasuk',
        'tglkeluar',
        'jmlkeluar',
        'stok',

    ];
}
