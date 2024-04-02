<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rest;
use Illuminate\Support\Facades\Auth;

class RestController extends Controller
{
    public function rest_start()
    {
        $user_id = Auth::id();

        $ongoing_rest = Rest::where("user_id", $user_id)->whereNull("rest_end")->first();

        if ($ongoing_rest) {
            return redirect("/");
        }

        $rest_start = now();

        Rest::create([
            "user_id" => $user_id,
            "rest_start" => $rest_start,
            "rest_end" => null,
        ]);

        return redirect("/");
    }

    public function rest_end()
    {
        $user_id = Auth::id();
        $rest_end = now();
        $latest_rest = Rest::where('user_id', $user_id)
            ->whereNull('rest_end')
            ->latest('rest_start')
            ->first();

        if ($latest_rest) {
            $latest_rest->update([
                "rest_end" => $rest_end
            ]);
            return redirect("/");
        }
        return redirect("/");
    }
}
