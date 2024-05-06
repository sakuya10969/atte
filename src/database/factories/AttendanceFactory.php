<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            "attendance_date" => "2024-05-01",
            "attendance_start" => "2024-05-01 09:00:00",
            "attendance_end" => "2024-05-01 18:00:00",
            "user_id" => array_pop($user_id)
        ];
    }
}
