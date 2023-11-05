<?php

namespace App\Models;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangkeluar extends Model
{
    use HasFactory;
    // protected $primaryKey = 'id_keluar';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'id_pbarang',
        'kodebarang',
        'tglkeluar',
        'jmlahkeluar',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'kodebarang', 'kodebarang');
    }

    public function pbarang()
    {
        return $this->belongsTo(Pbarang::class, 'id_pbarang', 'id');
    }
}
