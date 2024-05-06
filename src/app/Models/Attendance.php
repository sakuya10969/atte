<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = ["user_id", "attendance_date", "attendance_start", "attendance_end"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rests()
    {
        return $this->hasMany(Rest::class);
    }

    public function attendance_time()
    {
        $attendance_start = Carbon::parse($this->attendance_start);
        $attendance_end = Carbon::parse($this->attendance_end);
        $attendance_time = $attendance_end->diff($attendance_start);

        return $attendance_time->format("%H:%I:%S");
    }

    public function rest_time()
    {
        return $this->rests->map(function ($rest) {
            $rest_start = Carbon::parse($rest->rest_start);
            $rest_end = Carbon::parse($rest->rest_end);
            $rest_time = $rest_end->diff($rest_start);
            return $rest_time->format("%H:%I:%S");
        })->implode(":");
    }
}
