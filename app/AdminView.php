<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminView extends Model
{
    //
    protected $table = 'users';

    protected $fillable = [
        'name', 'email', 'password', 'happy', 'rating', 'year_id'
    ];
}
