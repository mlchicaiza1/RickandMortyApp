<?php

use App\Http\Controllers\Web\CharactersController;
use App\Http\Controllers\Web\EpisodesController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\LocationsController;

Route::get('/', [HomeController::class, 'index']);


Route::get('/characters', [CharactersController::class, 'index'])
    ->name('characters');
Route::get('/characters/{id}', [CharactersController::class, 'show'])
    ->name('characters.show');



Route::get('/locations', [LocationsController::class, 'index'])
    ->name('locations');
Route::get('/locations/{id}', [LocationsController::class, 'show'])
    ->name('locations.show');

Route::get('/episodes', [EpisodesController::class, 'index'])
    ->name('episodes');
Route::get('/episodes/{id}', [EpisodesController::class, 'show'])
    ->name('episodes.show');

