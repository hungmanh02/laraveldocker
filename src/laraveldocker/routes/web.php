<?php

use App\Http\Controllers\ContactController;
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

Route::get('/',[ContactController::class,'form_contact'])->name('index');
Route::get('/show-list',[ContactController::class,'show_list'])->name('show_list');
Route::post('/save-contact',[ContactController::class,'creat_form']);
Route::get('/filter',[ContactController::class,'filter']);
Route::get('/detail/{id}',[ContactController::class,'detail'])->name('detail');
Route::get('/edit/{id}',[ContactController::class,'edit'])->name('edit');
Route::post('/update/{id}',[ContactController::class,'update'])->name('update');
Route::delete('/delete/{id}',[ContactController::class,'delete'])->name('delete');
Route::get('/search',[ContactController::class,'search'])->name('search');
