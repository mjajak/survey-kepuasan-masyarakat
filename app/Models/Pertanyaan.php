<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Jawaban;

class Pertanyaan extends Model
{
    protected $table = 'tbl_pertanyaan';

    protected $primaryKey = 'id';

    protected $guarded = [];

    public $timestamps = false;

    public function answers(): BelongsToMany
    {
        return $this->belongsToMany(Jawaban::class, 'pertanyaan_jawaban', 'pertanyaan_id', 'jawaban_id');
    }

    public function jawaban()
    {
        return $this->hasMany(Jawaban::class, 'id_pertanyaan');
    }
}
