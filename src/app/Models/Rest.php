<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Rest extends Model
{
    use HasFactory;

    protected $fillable = ["attendance_id", "rest_start", "rest_end"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function attendance()
    {
        return $this->belongsTo(Attendance::class);
    }

    public function rest_time()
    {
        $rest_start = Carbon::parse($this->rest_start);
        $rest_end = Carbon::parse($this->rest_end);
        $rest_time = $rest_end->diff($rest_start);
        return $rest_time->format("%H:%I:%S");
    }
}
