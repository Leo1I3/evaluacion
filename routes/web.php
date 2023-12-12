<?php

use App\Http\Controllers\Fcontroller;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/','inicio')->name('inicio');
Route::get('/ficha',[Fcontroller::class, 'index'])->name('ficha');
Route::post('/fichapost',[Fcontroller::class,'store'])->name('fichaf');
Route::post('//ficham/{id}/put',[Fcontroller::class,'update'])->name('fichaff');
Route::delete('/fichae/{id}/destroy',[Fcontroller::class,'destroy'])->name('fichafff');
