<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QrCodeController;
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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', [QrCodeController::class, 'show'] );
Route::get('with-color', [QrCodeController::class, 'qrWithColor']);
Route::get('with-img', [QrCodeController::class, 'qrWithImage']);
Route::get('with-email', [QrCodeController::class, 'qrWithEmail']);
Route::get('with-phone', [QrCodeController::class, 'qrWithPhone']);
Route::get('with-sms', [QrCodeController::class, 'qrWithSMS'] );