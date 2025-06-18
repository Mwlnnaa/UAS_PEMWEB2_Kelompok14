<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriTokoh extends Model
{
    use HasFactory;

    protected $table = 'kategori_tokohs';
    protected $fillable = ['nama'];

    public function testimoni()
    {
        return $this->hasMany(Testimoni::class, 'kategori_tokohs_id');
    }
}
