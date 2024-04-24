<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ViewController;

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




//Routes this payment
Route::post('/process-payment', [PaymentController::class, 'processPayment'])->name('process.payment');
Route::post('/create-customer', [PaymentController::class, 'createCustomer'])->name('create.customer');

//Routes View:
Route::get('/', 'App\Http\Controllers\ViewController@customerView');
Route::get('/payment', 'App\Http\Controllers\ViewController@paymentView');
Route::get('/thankYou', 'App\Http\Controllers\ViewController@thankYou'); //a fazer
