<?php

use App\Controllers\HomeController;
use App\Controllers\TrainerController;
use App\Kernel\Router\Route;

return [
    Route::get('/home',[HomeController::class,'index']),
    Route::get('/trainer',[TrainerController::class,'index']),

];
