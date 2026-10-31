<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocieteController;

Route::resource('societes', SocieteController::class);

Route::get('/', function () {
    return view('welcome');
});
