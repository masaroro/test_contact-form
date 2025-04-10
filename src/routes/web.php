<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;

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

// Route::get('/', function () {
//     return view('register');
// });

Route::get('/',[ContactController::class,'index']);
Route::post('/confirm',[ContactController::class,'confirm']);
Route::post('/confirm/action', [ContactController::class, 'handleConfirmAction'])->name('handle.confirm.action');
Route::post('/thanks',[ContactController::class,'store']);

Route::middleware('auth')->group(function () {
    Route::get('/admin', [AuthController::class, 'index']);
});