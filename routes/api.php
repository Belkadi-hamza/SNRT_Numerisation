<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GenreController;
use App\Http\Controllers\Api\SupportController;
use App\Http\Controllers\Api\TechnicienController;
use App\Http\Controllers\Api\TypeDeSupportController;

Route::apiResource('supports', SupportController::class);
Route::apiResource('techniciens', TechnicienController::class);
Route::apiResource('type_de_supports', TypeDeSupportController::class);
Route::apiResource('genres', GenreController::class);

