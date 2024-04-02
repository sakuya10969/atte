<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Attendance;
use App\Models\Rest;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();

        $ongoing_attendance = Attendance::where("user_id", $user_id)->whereNull("attendance_end")->first();

        $ongoing_rest = Attendance::where("user_id", $user_id)->whereNull("rest_end")->first();

        return view("index", compact("ongoing_attendance", "ongoing_rest"));
    }

    public function attendance()
    {
        $user_items = User::all();
        $attendance_items = Attendance::all();
        $rest_items = Rest::all();

        return view("attendance", compact("attendance_items"));
    }

    public function attendance_start()
    {
        $user_id = Auth::id();


        $ongoing_attendance = Attendance::where("user_id", $user_id)->whereNull("attendance_end")->first();

        if ($ongoing_attendance) {
            return redirect("/");
        }

        $attendance_start = now();

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

        $latest_attendance = Attendance::where("user_id", $user_id)->whereNull("attendance_end")->first();

        $attendance_end = now();

        if ($latest_attendance) {
            $latest_attendance->update([
                "attendance_end" => $attendance_end
            ]);
            return redirect("/");
        };

        return redirect("/");
    }
}
