<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\RestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware("auth")->group(function(){
    Route::get("/", [AttendanceController::class, "index"]);
    Route::get("/attendance/{date?}", [AttendanceController::class, "attendance"])->name("attendance.date");
    Route::post("/attendance_start", [AttendanceController::class, "attendance_start"]);
    Route::post("/attendance_end", [AttendanceController::class, "attendance_end"]);
    Route::post("/rest_start", [RestController::class, "rest_start"]);
    Route::post("/rest_end", [RestController::class, "rest_end"]);
});

