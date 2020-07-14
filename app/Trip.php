<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $fillable = ['class_name','departure_time','arrival_time','local_price','foregin_price','car_id','route_id'];

    public function routes()
{
    return $this->belongsTo('App\Route','route_id');
}

}
