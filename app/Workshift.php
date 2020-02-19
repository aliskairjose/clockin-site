<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class WorkShift extends Model
{
    use Notifiable;

    protected $fillable = ['employee_id', 'company_id', 'clock_in_id', 'clock_out_id'];
}
