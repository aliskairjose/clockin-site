<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ClockRecording extends Model
{
    use Notifiable;

    protected $fillable = ['type', 'ip', 'lat', 'lon', 'device_name'];
}
