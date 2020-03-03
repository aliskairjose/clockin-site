<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
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
            'id'                => $this->id,
            'name'              => $this->name,
            'email'             => $this->email,
            'phone'             => $this->phone,
            'country_id'        => $this->country_id,
            'postcode'          => $this->poscode,
            'picture'           => $this->picture,
            'blocked'           => $this->blocked,
            'active'            => $this->active,
            'last_login'        => $this->last_login,
            'role'              => new \App\Http\Resources\Role($this->role),
            'companies'         => new CompanyCollection($this->companies),
        ];
    }
}
