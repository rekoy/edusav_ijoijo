<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersModel extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'id', 'file_name_img', 'url_img', 'name', 'nomor', 'msisdn', 'email', 'email_verified_at', 'password', 'remember_token', 'created_at', 'updated_at', 'stasiun_id',
    ];
}
