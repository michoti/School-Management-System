<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(function(){

    require __DIR__ . '/api/v1/students.php';
    
});
