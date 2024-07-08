<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\TechnicienController;
use App\Http\Controllers\StatistiquesController;
use App\Http\Controllers\TypeDeSupportController;

// Route::get('/', function () {
//     return view('index');
// })->name('home');
Route::get('/', [StatistiquesController::class, 'index'])->name('home');

Route::resource('genres', GenreController::class);
Route::resource('supports', SupportController::class);
Route::resource('techniciens', TechnicienController::class);
Route::resource('types_de_support', TypeDeSupportController::class);

Route::get('/statistiques', [StatistiquesController::class, 'index'])->name('statistiques.index');
Route::get('statistiques/duree-par-genre', [StatistiquesController::class, 'dureeParGenre']);
Route::get('statistiques/duree-par-type', [StatistiquesController::class, 'dureeParType']);
Route::get('statistiques/duree-par-technicien', [StatistiquesController::class, 'dureeParTechnicien']);

// Route::get('/search', function () {return view('supports.search');})->name('search');
Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::get('/search/simple', [SearchController::class, 'simpleSearch'])->name('search.simple');
Route::get('/search/advanced', [SearchController::class, 'advancedSearch'])->name('search.advanced');

