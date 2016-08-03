<?php

namespace Directory\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Client extends Model
{
    protected $fillable = ['user_id','company','activities','what-i-do','website','mobile','phone','country','address'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function sectors(){
        return $this->belongsToMany(Sector::class)->withTimestamps();
    }

}
