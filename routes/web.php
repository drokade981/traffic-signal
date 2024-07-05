<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignalController;

Route::get('/', function () {
    return view('traffic-signal');
});

Route::post('start-signal', [SignalController::class, 'startSignal'])->name('start-signal');
Route::get('get-signal', [SignalController::class, 'getSignal'])->name('get-signal');