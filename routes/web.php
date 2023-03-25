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
Route::get('with-blade', [QrCodeController::class, 'qrWithBlade']);

Route::get('custom1', [QrCodeController::class, 'qrCustom1']);
Route::get('custom2', [QrCodeController::class, 'qrCustom2']);
Route::get('custom3', [QrCodeController::class, 'qrCustom3']);

Route::get('custom4', [QrCodeController::class, 'qrCustom4']);
Route::get('custom5', [QrCodeController::class, 'qrCustom5']);
Route::get('custom6', [QrCodeController::class, 'qrCustom6']);
Route::get('custom7', [QrCodeController::class, 'qrCustom7']);
Route::get('custom8', [QrCodeController::class, 'qrCustom8']);