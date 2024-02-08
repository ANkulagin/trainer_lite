<?php

use App\Controllers\HomeController;
use App\Controllers\TrainerController;
use App\Router\Route;
return [
    Route::get('/home',[HomeController::class,'index']),
    Route::get('/trainer',[TrainerController::class,'index']),

];
