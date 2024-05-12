<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class AttendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $user_id = null;

        if (is_null($user_id)) {
            $user_id = range(1, 21);
            shuffle($user_id);
        }

        return [
            "attendance_date" => Carbon::now()->toDateString(),
            "attendance_start" => Carbon::createFromTime(9, 0, 0)->toDateTimeString(),
            "attendance_end" => Carbon::createFromTime(18, 0, 0)->toDateTimeString(),
            "user_id" => array_pop($user_id)
        ];
    }
}
