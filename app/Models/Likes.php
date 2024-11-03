<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    protected $table = [
        'user_id',
        'liked_user_id'
    ];
}
