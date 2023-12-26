<?php

namespace App\Models;

use App\Models\buku;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class kategori extends Model
{
    use HasFactory;
    protected $fillable = ['nama_kategori'];

    public function bukus()
    {
        return $this->hasMany(buku::class, 'id_kategori', 'id');
    }
}
