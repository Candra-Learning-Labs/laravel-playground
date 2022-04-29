<?php

use App\Http\Controllers\Checkout\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TelegramBotController;
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

Route::get('/', [
    CheckoutController::class,
    'index'
]);

Route::get('/try-checkout', [
    CheckoutController::class,
    'onSubmit'
]);

Route::get('/bot/test', [
    TelegramBotController::class,
    'index'
]);

Route::post('bot/webhook', [
    TelegramBotController::class,
    'handleWebhook'
]);

Route::resource('orders', OrderController::class)
    ->only(['index', 'show']);
