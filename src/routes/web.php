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

Route::middleware("auth")->group(function () {
    Route::get("/", [AttendanceController::class, "index"]);
    Route::get("attendance", [AttendanceController::class, "attendance"]);
    Route::post("/attendance/start", [AttendanceController::class, "attendance_start"]);
    Route::post("/attendance/end", [AttendanceController::class, "attendance_end"]);
    Route::post("/rest/start", [RestController::class, "rest_start"]);
    Route::post("/rest/end", [RestController::class, "rest_end"]);
});


Route::get("/register", [RegisteredUserController::class, "create"]);
Route::post("/register", [RegisteredUserController::class, "store"]);


Route::get("/login",[AuthenticatedSessionController::class,"sotre"]);
Route::post("/logout",[AuthenticatedSessionController::class,"destroy"]);