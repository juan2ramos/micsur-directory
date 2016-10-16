<?php

namespace Directory\Entities;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['message','date','from','date','to'];
}
