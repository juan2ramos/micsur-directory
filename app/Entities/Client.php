<?php

namespace Directory\Entities;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['user_id','company','activities','what-i-do','website','mobile','phone','validate'];

}
