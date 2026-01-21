<?php

use App\Http\Controllers\Api\WineController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("wines", [WineController::class, 'index']);

Route::get("wines/{wine}", [WineController::class, 'show']);
