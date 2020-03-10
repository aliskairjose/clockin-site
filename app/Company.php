<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Company extends Model
{
    use Notifiable;

    protected $fillable = ['name', 'description', 'phone', 'email', 'address', 'picture', 'country_id'];

    /**
     * Relacion mucho a muchos con Users
     */
    public function employees()
    {
        return $this->belongsToMany(User::class);
    }
}
