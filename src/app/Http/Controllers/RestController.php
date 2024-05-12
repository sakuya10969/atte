<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Attendance;

class RestController extends Controller
{
    public function rest_start()
    {
        $user_id = Auth::id();
        $attendance = Attendance::where("user_id",$user_id)->latest()->first();
        $attendance_id = $attendance->id;
        $ongoing_rest = Rest::where("attendance_id", $attendance_id)->whereNull("rest_end")->first();

        if ($ongoing_rest) {
            return redirect("/");
        }

        $rest_start = Carbon::now();

        Rest::create([
            "attendance_id" => $attendance_id,
            "rest_start" => $rest_start,
            "rest_end" => null,
        ]);

        return redirect("/");
    }



    public function rest_end()
    {
        $user_id = Auth::id();
        $attendance = Attendance::where("user_id",$user_id)->latest()->first();
        $attendance_id = $attendance->id;
        $rest_end = Carbon::now();
        $ongoing_rest = Rest::where("attendance_id", $attendance_id)->whereNull("rest_end")->first();

        if ($ongoing_rest) {
            $ongoing_rest->update([
                "rest_end" => $rest_end
            ]);
            return redirect("/");
        }
        return redirect("/");
    }
}
