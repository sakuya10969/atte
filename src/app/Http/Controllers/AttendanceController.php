<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Attendance;
use App\Models\Rest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function index()
    {
        return view("index");
    }



    public function attendance()
    {
        $attendance_items = User::with([
            'attendances' => function ($query) {
                $query->orderBy('attendance_date', 'asc');
            },
            'rests' => function ($query) {
                $query->orderBy('rest_date', 'asc');
            }
        ])->paginate(5);

        return view("attendance", compact("attendance_items"));
    }



    public function attendance_start()
    {
        $user_id = Auth::id();
        $ongoing_attendance = Attendance::where("user_id", $user_id)->whereNull("attendance_end")->first();

        if ($ongoing_attendance) {
            return redirect("/");
        };

        $attendance_start = Carbon::now();

        Attendance::create([
            "user_id" => $user_id,
            "attendance_start" => $attendance_start,
            "attendance_end" => null,
        ]);

        return redirect("/");
    }



    public function attendance_end()
    {
        $user_id = Auth::id();

        $ongoing_attendance = Attendance::where("user_id", $user_id)->whereNull("attendance_end")->first();

        $attendance_end = Carbon::now();

        if ($ongoing_attendance) {
            $ongoing_attendance->update([
                "attendance_end" => $attendance_end
            ]);
            return redirect("/");
        };

        return redirect("/");
    }
}
