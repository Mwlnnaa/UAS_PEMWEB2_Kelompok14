<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    use HasFactory;

    protected $table = 'testimonis';
    protected $fillable = [
        'tanggal',
        'nama_tokoh',
        'komentar',
        'rating',
        'produk_id',
        'kategori_tokohs_id'
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produks_id');
    }

    public function kategoriTokoh()
    {
        return $this->belongsTo(KategoriTokoh::class, 'kategori_tokohs_id');
    }
}