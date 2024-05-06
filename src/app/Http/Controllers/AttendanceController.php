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



    public function attendance(Request $request)
    {
        $unique_dates = Attendance::selectRaw('DATE(attendance_date) as date')
            ->distinct()
            ->get()
            ->pluck('date')
            ->toArray();

        $selected_date = $request->query('date', $unique_dates[0]);

        $attendance_by_date = Attendance::with(["user", "rests"])->whereDate("attendance_date", $selected_date)->paginate(5);

        $attendance_items = Attendance::with(["user", "rests"])->paginate(5);

        return view("attendance", compact("attendance_by_date", "attendance_items", "unique_dates", "selected_date"));
    }



    public function attendance_start()
    {
        $user_id = Auth::id();
        $ongoing_attendance = Attendance::where("user_id", $user_id)->whereNull("attendance_end")->first();

        if ($ongoing_attendance) {
            return redirect("/");
        };

        $attendance_start = Carbon::now();
        $attendance_date = Carbon::today()->format('Y-m-d');

        Attendance::create([
            "user_id" => $user_id,
            "attendance_date" => $attendance_date,
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
