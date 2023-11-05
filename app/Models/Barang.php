<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $primaryKey = 'kodebarang';
    public $incrementing = false;
    public $timestamps = false;
    protected $table = 'barangs';

    protected $fillable = [
        'kodebarang',
        'namabarang',
        'stok',
        'jenis',
        // 'size',
    ];
}
