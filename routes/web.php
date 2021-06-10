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

Auth::routes();

Route::group(['prefix' => '/category'], function() {
    Route::post('/new', [\App\Http\Controllers\CategoryController::class, 'store'])->name('category.new');
    Route::post('/update', [\App\Http\Controllers\CategoryController::class, 'update'])->name('category.edit');
    Route::get('/delete', [\App\Http\Controllers\CategoryController::class, 'destroy'])->name('category.destroy');
});

Route::group(['prefix' => '/services'], function() {
    Route::post('/new', [\App\Http\Controllers\ServiceController::class, 'store'])->name('services.new');
    Route::get('/delete', [\App\Http\Controllers\ServiceController::class, 'destroy'])->name('services.destroy');
    Route::post('/update', [\App\Http\Controllers\ServiceController::class, 'update'])->name('services.update');
});

Route::post('/new/comment', [\App\Http\Controllers\CommentsController::class, 'store'])->name('comment.new');
Route::post('/new/contacts', [\App\Http\Controllers\ContactsController::class, 'store'])->name('contact.new');


Route::get('/manager', [\App\Http\Controllers\ManagerController::class,"index"])->name('home_manager');
Route::get('/admin', [\App\Http\Controllers\HomeController::class,"index"])->name('home');

//Route::get('/home', [\App\Http\Controllers\HomeController::class,"index"])->name('home');

Route::get('/manager/comments', [\App\Http\Controllers\CommentsController::class,"index"])->name('manager.comments');
Route::get('/manager/contacts', [\App\Http\Controllers\ContactsController::class,"index"])->name('manager.contact');
