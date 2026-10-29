<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudioModel extends Model
{
    protected $table = 'studio';

    protected $fillable = [
        'id', 'stasiun_id', 'nama',
        'alamat', 'kode', 'latitude', 'longitude',
        'created_at', 'updated_at',
    ];

    public function stasiun()
    {
        return $this->belongsTo('App\Models\Lokasi');
    }
}
