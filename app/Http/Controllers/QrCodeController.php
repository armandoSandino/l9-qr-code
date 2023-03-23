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

}
