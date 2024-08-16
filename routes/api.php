<?php

use App\Http\Controllers\GuestController;
use App\Http\Middleware\DebugMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware(DebugMiddleware::class)->group(function () {
    Route::apiResource('guests', GuestController::class);
});

