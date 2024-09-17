<?php

use App\Http\Controllers\FilterController;
use App\Http\Controllers\StatsController;

use Illuminate\Support\Facades\Route;

Route::get('filter/countries', [FilterController::class, 'getCountries']);
Route::get('filter/devices', [FilterController::class, 'getDevices']);

Route::post('stats/clicks', [StatsController::class, 'getClicks']);
Route::post('stats/impressions', [StatsController::class, 'getImpressions']);
