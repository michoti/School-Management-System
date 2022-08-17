<?php 

use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function(){

    require __DIR__ . '/api/v1/students.php';
    require __DIR__ . '/api/v1/teachers.php';
    
});
