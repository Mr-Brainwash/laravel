<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\IndexController as AdminController;
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

//Route::get('/', function () {
//    return view('welcome');
//});
//Route::get('/news', [NewsController::class, 'index'])->name('news');
//Route::get('/news/{id}', [NewsController::class, 'show'])->name('one');


Route::get('/', [IndexController::class, 'index'])->name('home');
Route::view('/about', 'about')->name('about');

Route::name('news.')
    ->prefix('news')
    ->group(function(){
        Route::get('/', [NewsController::class, 'index'])->name('index');
        Route::get('/{id}', [NewsController::class, 'show'])->name('one');
    });

Route::name('admin.')
    ->prefix('admin')
    ->group(function(){
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::get('/test', [AdminController::class, 'test'])->name('test');
        Route::get('/test_1', [AdminController::class, 'test_1'])->name('test_1');
    });
