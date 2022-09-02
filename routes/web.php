<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeneralController;
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

Route::get('tinymce', [GeneralController::class, 'tinymce'])->name('tinymce');
Route::post('tinymce_post', [GeneralController::class, 'tinymce_post'])->name('tinymce_post');


Route::get('ckeditor', [GeneralController::class, 'ckeditor'])->name('ckeditor');
Route::post('ckeditor_post', [GeneralController::class, 'ckeditor_post'])->name('ckeditor_post');

Route::get('summernote', [GeneralController::class, 'summernote'])->name('summernote');
Route::post('summernote_post', [GeneralController::class, 'summernote_post'])->name('summernote_post');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
