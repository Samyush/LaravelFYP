<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

class Year extends Model
{
    //
    protected $table ='years';

    protected $fillable = ['year',];


//    the following way allows us to define as the way we like to define foreign key
//    public function users(){
//        return $this->hasMany(User::class, 'user_year');
//    }
}
