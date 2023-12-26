<?php

namespace App\Models;

use App\Models\buku;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class penerbit extends Model
{
    use HasFactory;
    protected $fillable = ['nama_penerbit', 'alamat_penerbit', 'telepon_penerbit'];

    public function bukus()
    {
        return $this->hasMany(buku::class, 'id_penerbit', 'id');
    }
}
