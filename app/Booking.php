<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['user_id','car_id','trip_id','b_date','seat_no','total_price'];



public function users()
{
	return $this->hasMany('App\User');
}
}
// public function car()
// {
// 	return $this->
// }