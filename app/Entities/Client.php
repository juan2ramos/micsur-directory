<?php

namespace Directory\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Client extends Model
{
    protected $fillable = ['user_id','company','activities','what-i-do','website','mobile','phone'];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
