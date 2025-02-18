<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ScheduleController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('schedule', ScheduleController::class)->only(['index', 'create', 'edit', 'update', 'destroy']);
    Route::get('schedule/month', [ScheduleController::class, 'month'])->name('ScheduleMonth');
    Route::get('schedule/week', [ScheduleController::class, 'week'])->name('ScheduleWeek');
});
