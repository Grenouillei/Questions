<?php

use Illuminate\Support\Facades\Route;

Route::middleware('admin')->group(function (){
    Route::resource('questions','QuestionController');
});
