<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $fillable = ['from','to'];

public function locationFrom()
{
    return $this->belongsto('App\Location','from');
}

public function locationTo()
{
    return $this->belongsto('App\Location','to');
}


public function trip()
{
    return $this->belongsto('App\Trip');
}




}


