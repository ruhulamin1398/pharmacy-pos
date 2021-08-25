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



Route::get('/',function(){
    return redirect(route("invoices.create"));
})->name("index") ->middleware('auth');

Route::get('/about',function(){
    return view("about");
})->name('about') ->middleware('auth');


Route::resource('medicines', App\Http\Controllers\MedicineController::class) ->middleware('auth');

Route::resource('invoices', App\Http\Controllers\InvoiceController::class) ->middleware('auth');





Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
