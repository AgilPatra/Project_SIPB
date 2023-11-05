<?php

namespace App\Models;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pbarang extends Model
{
    use HasFactory;
    // protected $primaryKey = 'id_pbarang';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'kodebarang',
        'tglpermintaan',
        'jmlpermintaan',
        'kgudang',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'kodebarang', 'kodebarang');
    }
}
