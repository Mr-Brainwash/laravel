<?php

use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use UniSharp\LaravelFilemanager\Lfm;

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


Route::get('/', [IndexController::class, 'index'])->name('home');
Route::match(['get','post'], '/profile', [ProfileController::class, 'update'])
    ->middleware('auth')
    ->name('updateProfile');

Route::name('news.')
    ->prefix('news')
    ->group(function () {
        Route::get('/', [NewsController::class, 'index'])->name('index');
        Route::get('/one/{id}', [NewsController::class, 'show'])->name('one');
        Route::name('category.')
            ->group(function () {
                Route::get('/categories', [CategoryController::class, 'index'])->name('index');
                Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('show');
            });

    });


Route::name('admin.')
    ->middleware(['auth', 'is_admin'])
    ->prefix('admin')
    ->group(function () {

        Route::get('/users', [UserController::class, 'index'])->name('updateUsers');
        Route::get('/users/toggleAdmin/{user}', [UserController::class, 'toggleAdmin'])->name('toggleAdmin');

        Route::get('/parser', [ParserController::class, 'index'])->name('parser');

        Route::get('/', [AdminNewsController::class, 'index'])->name('index');
        Route::get('/test1', [AdminController::class, 'test1'])->name('test1');
        Route::get('/test2', [AdminController::class, 'test2'])->name('test2');
        Route::resource('/news', AdminNewsController::class)->except('show');

    });

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth', 'is_admin']], function () {
    Lfm::routes();
});
Route::get('/auth/vk', [LoginController::class, 'loginVK'])->name('vkLogin');
Route::get('/auth/vk/response', [LoginController::class, 'responseVK'])->name('vkResponse');

Route::view('/about', 'about')->name('about');
Auth::routes();


//        Route::get('/news/create', [AdminNewsController::class, 'create'])->name('news.create');
//        Route::get('/news/{news}/edit', [AdminNewsController::class, 'edit'])->name('news.edit');
//        Route::post('/news', [AdminNewsController::class, 'store'])->name('news.store');
//        Route::delete('/news/{news}', [AdminNewsController::class, 'destroy'])->name('news.destroy');
//        Route::put('/news/{news}', [AdminNewsController::class, 'update'])->name('news.update');

//Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
//Route::post('login', [LoginController::class, 'login']);
//Route::get('logout', [LoginController::class, 'logout'])->name('logout');
//Route::post('logout', [LoginController::class, 'logout']);


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
