<?php

use App\Http\Controllers\ClassRoomController;
use Illuminate\Support\Facades\Route;

Route::name('classes.')
    ->group(function (){

    Route::get('/classes', [ClassRoomController::class, 'index'])->name('index');

    Route::get('/classes/{class}', [ClassRoomController::class, 'show'])->name('show')->whereNumber('class');

    Route::post('/classes', [ClassRoomController::class, 'store'])->name('store');

    Route::patch('/classes/{class}', [ClassRoomController::class, 'update'])->name('update');

    Route::delete('/classes/{class}', [ClassRoomController::class, 'destroy'])->name('delete');

});