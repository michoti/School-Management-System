<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::name('students.')
    ->group(function (){

    Route::get('/students', [StudentController::class, 'index'])->name('index');

    Route::get('/students/{student}', [StudentController::class, 'show'])->name('show')->whereNumber('student');

    Route::post('/students', [StudentController::class, 'store'])->name('store');

    Route::put('/students/{student}', [StudentController::class, 'update'])->name('update');

    Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('delete');

});