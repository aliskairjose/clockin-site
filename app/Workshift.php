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

    public function timeControlPreviousWeeks($reference_date)
    {
        $weeks = [];
        for ($i=0; $i < 4 ; $i++) {
            $start_week = $this->createFromDate($reference_date)->subDays(7*$i)->startOfWeek();
            $weeks[$i]['week'] = $start_week;
            for ($e=0; $e < 7; $e++) {
                $weeks[$i]['days_of_week'][$e]['start'] = $this->createFromDate($reference_date)->subDays(7*$i)->startOfWeek()->addDays($e)->startOfDay();
                $weeks[$i]['days_of_week'][$e]['end'] = $this->createFromDate($reference_date)->subDays(7*$i)->startOfWeek()->addDays($e)->endOfDay();
            }
        }
        return $weeks;
    }
}
