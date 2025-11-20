<?php

use App\Http\Controllers\Apis\RickAndMortyController;
use Illuminate\Support\Facades\Route;



Route::get('/characters', [RickAndMortyController::class, 'characters']);
Route::get('/character/{id}', [RickAndMortyController::class, 'character']);
Route::get('/episodes', [RickAndMortyController::class, 'episodes']);
Route::get('/episode/{id}', [RickAndMortyController::class, 'episode']);
Route::get('/locations', [RickAndMortyController::class, 'locations']);
Route::get('/location/{id}', [RickAndMortyController::class, 'location']);

