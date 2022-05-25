<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ PostController;
use App\Http\Controllers\ FrontEndController;
use App\Http\Controllers\ UserController;

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

Auth::routes();
//front end routes
Route::get('/', [FrontEndController::class, 'home'])->name('website');
Route::get('/about', [FrontEndController::class, 'about'])->name('website.about');
Route::get('/category/{slug}', [FrontEndController::class, 'category'])->name('website.category');
Route::get('/contact', [FrontEndController::class, 'contact'])->name('website.contact');
Route::get('/post/{slug}', [FrontEndController::class, 'post'])->name('website.post');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// admin routes
Route::group(['prefix' =>'admin', 'middleware'=>['auth']], function(){
    Route::get('/dashboard', function(){
        return view('admin.dashboard.index');
    })->name('admin.dashboard.index');
    
    Route::resource('/category', CategoryController::class);
    Route::resource('/tag', TagController::class);
    Route::resource('/post', PostController::class);

    Route::resource('user', UserController::class);

    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::post('/profile', [UserController::class, 'profile_update'])->name('user.profile.update');
});

