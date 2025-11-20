<?php

use App\Http\Controllers\Apis\RickAndMortyController;
use Illuminate\Support\Facades\Route;



Route::get('/characters', [RickAndMortyController::class, 'characters']);
Route::get('/character/{id}', [RickAndMortyController::class, 'character']);
Route::get('/characters/{}', [RickAndMortyController::class, 'characters']);

