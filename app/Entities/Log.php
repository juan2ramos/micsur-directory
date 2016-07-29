<?php

namespace Directory\Entities;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = ['user_id','action','table','data'];
}
