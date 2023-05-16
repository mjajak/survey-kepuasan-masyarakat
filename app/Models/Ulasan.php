<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    protected $table = 'tbl_ulasan';
    protected $primaryKey = 'id';

    // Use v_ulasan for select/view operations
    public static function selectUlasan()
    {
        return static::query()->from('v_ulasan');
    }
}
