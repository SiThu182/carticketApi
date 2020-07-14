<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Car;
use App\Route;
class TripResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'    => $this->id,
            'class_name'     => $this->class_name,
            'departure_time' => $this->departure_time,
            'arrival_time'   => $this->arrival_time,
            'local_price'    => $this->local_price,
            'foregin_price'  => $this->foregin_price,
            'car_id'         => new CarResource(Car::find($this->car_id)),
            'route_id'       => new RouteResource(Route::find($this->route_id))

        ];
    }
}
