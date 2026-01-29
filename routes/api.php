<?php

use App\Http\Controllers\Api\WineController;
use Illuminate\Support\Facades\Route;

Route::get("wines", [WineController::class, 'index']);

Route::get('wines/filters', [WineController::class, 'filters']);

Route::get("wines/{wine}", [WineController::class, 'show']);
