<?php

namespace App\Http\Controllers\Web;

use Inertia\Inertia;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return Inertia::render('Home', [
            'message' => 'Bienvenido  a Rick and Morty Api con Laravel + Vue + Inertia'
        ]);
    }
}
