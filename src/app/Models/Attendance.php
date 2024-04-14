<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = ["user_id", "attendance_start", "attendance_end"];

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function attendance_time()
    {
        $attendance_start = Carbon::parse($this->attendance_start);
        $attendance_end = Carbon::parse($this->attendance_end);
        $attendance_time = $attendance_end->diff($attendance_start);

        return $attendance_time->format("%H:%I:%S");
    }
}
