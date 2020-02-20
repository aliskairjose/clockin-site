<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Company extends Model
{
    use Notifiable;

    protected $fillable = ['name', 'description'];

    /**
     * Relacion mucho a muchos con Users
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
