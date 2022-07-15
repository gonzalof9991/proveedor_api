<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class User extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function ticket(){
        return $this->hasMany(Tickets::class,'user_id');
    }
}
