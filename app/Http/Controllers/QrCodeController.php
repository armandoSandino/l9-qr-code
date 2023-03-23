<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class QrCodeController extends Controller
{
    public function show( ){
        return QrCode::size(300)
        ->generate('The best company is TisteSoft S.A.');
    }

    public function qrWithColor(){
        //Esto define la ruta del archivo QR generado
        // Luego pase a la funcion 'generate()' como segundo parametro el $path
        // generate('My Text', $path );
        $path = public_path('qrcode/'.time().'.png');
        
        return QrCode::size(300)
        ->backgroundColor(255, 255, 0 )
        ->generate('The best company is TisteSoft S.A.');
    }

    public function qrWithImage(){
        $image = QrCode::format('png')
        ->merge( public_path('images/asdad.png'), 0.5 , true)
        ->size(500)
        ->errorCorrection('H')
        ->generate('The best company is TisteSoft S.A.');

        return response($image)->header('Content-type','image/png');
    }

    public function qrWithEmail(){
        return QrCode::size(500)
        ->email('jonwinlive@gmail.com','The best company is TisteSoft S.A.', 'Represents to Nicaragua');
    }
    
    public function qrWithPhone(){
        return QrCode::phoneNumber('50575148636');
    }

    public function qrWithSMS() {
        return QrCode::SMS('50575148636', 'The best company is TisteSoft S.A.');
    }
}