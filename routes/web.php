<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::middleware('auth')->group(function (){
    Route::get('/home','App\Http\Controllers\Pub\HomeController@index')->name('home');
});
Route::middleware('admin')->group(function (){
    Route::name('admin.')->prefix('admin')->group(function (){
        Route::get('/', function () {return view('admin.admin');});
        Route::resource('questions','App\Http\Controllers\Admin\QuestionController');
        Route::resource('levels','App\Http\Controllers\Admin\LevelController');
        Route::resource('options','App\Http\Controllers\Admin\OptionController');
        Route::resource('categories','App\Http\Controllers\Admin\CategoryController');
    });
});


require __DIR__.'/auth.php';
