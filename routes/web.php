<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

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

//Route::get('/list', function (){
 //   return view('list');
//});
Route::get('list',[ClientController::class,'index']);
Route::view('insert','list');
Route::post('insert',[ClientController::class,'insert']);
Route::get('edit/{id}',[ClientController::class,'edit']);
Route::post('update/{id}',[ClientController::class,'update']);
Route::get('delete/{id}',[ClientController::class,'destroy']);
