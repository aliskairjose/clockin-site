<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class WorkShift extends Model
{
    use Notifiable;

    protected $fillable = ['employee_id', 'company_id', 'clock_in_id', 'clock_out_id'];

    /**
     * Retorna el horario del empleado en la empresa seleccionada
     */
    public function scopeSchedule($query, $company_id)
    {
        // return $query()->where('company_id', '=', $company_id);
        return WorkShift::where('company_id', $company_id)->get();

    }
}
