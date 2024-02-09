<?php

use App\Controllers\HomeController;
use App\Controllers\TrainerController;
use App\Kernel\Router\Route;

return [
    Route::get('/home',[HomeController::class,'index']),
    Route::get('/trainer',[TrainerController::class,'index']),
    Route::get('/admin/trainer/add',[TrainerController::class,'add']),
    Route::post('/admin/trainer/add',[TrainerController::class,'store']),
];
