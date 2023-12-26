<?php

namespace App\Models;

use App\Models\buku;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class penulis extends Model
{
    use HasFactory;
    protected $fillable = ['nama_penulis', 'tanggal_lahir', 'negara_asal'];

    public function bukus()
    {
        return $this->hasMany(buku::class, 'id_penulis', 'id');
    }
}
