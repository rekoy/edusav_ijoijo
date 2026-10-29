<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActionLogModel extends Model
{
    protected $table = 'action_log';

    protected $fillable = [
        'id', 'user_name', 'action', 'created_at', 'request', 'response', 'latitude', 'longitude',
    ];
}
