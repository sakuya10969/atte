<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class RestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $attendance_id = null;

        if (is_null($attendance_id)) {
            $attendance_id = range(1, 10);
            shuffle($attendance_id);
        }

        return [
            "rest_start" => Carbon::createFromTime(13, 0, 0)->toDateTimeString(),
            "rest_end" => Carbon::createFromTime(14, 0, 0)->toDateTimeString(),
            "attendance_id" => array_pop($attendance_id)
        ];
    }
}
