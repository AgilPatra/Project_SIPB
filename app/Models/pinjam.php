<?php

namespace App\Models;

use App\Models\buku;
use App\Models\anggota;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class pinjam extends Model
{
    use HasFactory;
    protected $fillable = ['id_anggota', 'id_buku', 'tanggal_peminjaman', 'tanggal_pengembalian', 'status_pengembalian', 'denda'];

    public function anggota()
    {
        return $this->belongsTo(anggota::class, 'id_anggota', 'id');
    }

    public function buku()
    {
        return $this->belongsTo(buku::class, 'id_buku', 'id');
    }
}
