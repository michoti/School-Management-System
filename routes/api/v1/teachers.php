<?php

use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::name('teachers.')
    ->group(function (){

    Route::get('/teachers', [TeacherController::class, 'index'])->name('index');

    Route::get('/teachers/{teacher}', [TeacherController::class, 'show'])->name('show')->whereNumber('teacher');

    Route::post('/teachers', [TeacherController::class, 'store'])->name('store');

    Route::patch('/teachers/{teacher}', [TeacherController::class, 'update'])->name('update');

    Route::delete('/teachers/{teacher}', [TeacherController::class, 'destroy'])->name('delete');

});