<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClockRecording extends JsonResource
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
            'type'        => $this->type,
            'ip'          => $this->ip,
            'lat'         => $this->lat,
            'lon'         => $this->lon,
            'device_name' => $this->device_name
        ];
    }
}
