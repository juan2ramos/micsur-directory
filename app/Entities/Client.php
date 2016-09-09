<?php

namespace Directory\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Jenssegers\Date\Date;

class Client extends Model
{
    protected $fillable = ['user_id','company','activities','what-i-do','website','mobile','phone','country','address'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function countryName(){
        return $this->belongsTo(Country::class, 'country');
    }

    public function sectors(){
        return $this->belongsToMany(Sector::class)->withTimestamps();
    }
    public function getCreatedAtAttribute($value)
    {
        Date::setLocale('es');
        $date = new Date($value);
        return $date->diffForHumans();
    }
    public function getMobileAttribute($value){
        return [substr($value, 0,3) , substr($value, 3)];
    }
    public function getPhoneAttribute($value){
        return [substr($value, 0,3) , substr($value, 3,3),substr($value, 6)];
    }

}
