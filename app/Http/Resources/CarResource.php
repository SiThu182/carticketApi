<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
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
            'id' => $this->id,
            'car_no' => $this->car_no,
            'seat_no' => $this->seat_no,
            'car_image' => $this->car_image,
            'type' => $this->type
        ];
    }
}
