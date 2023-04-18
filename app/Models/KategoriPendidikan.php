<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriPendidikan extends Model
{
    protected $table = 'tbl_kategori_pendidikan';

    protected $fillable = [
        'keterangan',
        'kategori',
    ];
}
