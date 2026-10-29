<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StasiunModel extends Model
{
    protected $table = 'stasiun';

    protected $fillable = [
        'id', 'nama', 'kode', 'alamat', 'longitude', 'latitude', 'deskripsi', 'created_at', 'updated_at',
    ];
}
