<?php

namespace App\Models;

use App\Models\penulis;
use App\Models\kategori;
use App\Models\penerbit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class buku extends Model
{
    use HasFactory;
    protected $fillable = ['judul', 'id_penulis', 'id_penerbit', 'id_kategori', 'tahun_terbit',
        'isbn', 'jumlah_tersedia'];

    public function penulis()
    {
        return $this->belongsTo(penulis::class, 'id_penulis', 'id');
    }

    public function penerbit()
    {
        return $this->belongsTo(penerbit::class, 'id_penerbit', 'id');
    }

    public function kategori()
    {
        return $this->belongsTo(kategori::class, 'id_kategori', 'id');
    }
}
