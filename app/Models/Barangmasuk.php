<?php

namespace App\Models;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangmasuk extends Model
{
    use HasFactory;
    // protected $primaryKey = 'id_masuk';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'id',
        // 'id_pproduksi',
        'id_produksi',
        'tanggal_produksi',
        'kodebarang',
        'tglmasuk',
        'jmlahmasuk',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'kodebarang', 'kodebarang');
    }

    // public function pproduksi()
    // {
    //     return $this->belongsTo(Pproduksi::class, 'id_pproduksi', 'id');
    // }
}
