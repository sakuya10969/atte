<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RestFactory extends Factory
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

        static $attendance_id = null;

        if (is_null($attendance_id)) {
            $attendance_id = range(1, 10);
            shuffle($attendance_id);
        }

        return [
            "rest_start" => "2024-05-01 13:00:00",
            "rest_end" => "2024-05-01 14:00:00",
            "user_id" => array_pop($user_id),
            "attendance_id" => array_pop($attendance_id)
        ];
    }
}
