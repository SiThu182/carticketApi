<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable= ['car_no','seat_no','car_image','type'];
}
