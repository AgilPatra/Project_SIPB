<?php

namespace App\Models;

use App\Models\pinjam;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Foundation\Auth\User as Authenticatable;

class anggota extends Authenticatable
{
    use HasFactory;
    protected $fillable = ['nama', 'email', 'password' ,'alamat', 'nomor_telepon', 'tanggal_daftar'];

    public function peminjaman()
    {
        return $this->hasMany(pinjam::class, 'id_anggota', 'id');
    }
}
