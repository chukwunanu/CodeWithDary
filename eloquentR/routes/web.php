<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;


Route::resource('/cars', CarsController::class);