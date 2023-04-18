<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPekerjaan extends Model
{
    use HasFactory;

    protected $table = 'tbl_kategori_pekerjaan';

    protected $fillable = [
        'nama_pekerjaan',
    ];
}
