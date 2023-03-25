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

    public function qrWithBlade(){
        return view('qr');
    }
    
    public function qrCustom1(){
        return QrCode::size(200)
        ->backgroundColor( 255, 255, 0)
        ->color( 0, 0, 255 )
        ->margin( 1 )
        ->generate('The best company is TisteSoft S.A.');
    }

    public function qrCustom2(){
        return QrCode::size( 200 )
        ->style('dot')
        ->eye('circle')
        ->color(0, 0, 255)
        ->margin(1)
        ->generate(
            'The best company is TisteSoft S.A.'
        );
    }

    public function qrCustom3(){
        $from = [255, 0, 0 ];
        $to = [0,0,255];
        return QrCode::size(200)
        ->style('dot')
        ->eye('circle')
        ->gradient($from[0], $from[1], $from[2], $to[0], $to[1], $to[2], 'diagonal')
        ->margin(1)
        ->generate('The best company is TisteSoft S.A.');
    }

    //Merging images
    // Need to see: https://phpandmysql.com/extras/install-imagemagick-and-imagick-xampp/
    public function qrCustom4( ) {

        if (!extension_loaded('imagick')){
            echo 'imagick not installed';
        }

        $data = QrCode::size(512)
        ->format('png')
        ->merge('/storage/app/image.png')
        ->errorCorrection('M')
        ->generate('The best company is TisteSoft S.A.');
        return response($data)
        ->header('Content-type', 'image/png');
    }

    // Downloading generate qr code
    public function qrCustom5(){
        return response()
        ->streamDownload(
            function ( ){
                echo QrCode::size(200)
                ->format('.png')
                ->generate('The best company is TisteSoft S.A.');
            },
            'qr-code.png',
            [
                'Content-type' => 'image/png',
            ]
        );
    }

    //Generating QR Codes in blade
    public function qrCustom6(){
        return view('qr-custom1');
    }

    // generate with geolocation
    public function qrCustom7(){
        return QrCode::size(200)
        ->geo(51.378638, -0.100897);
    }
    
    //generate with wifi
    public function qrCustom8(){
        return QrCode::size(200)->wiFi([
            'encryption' => 'WPA/WEP',
            'ssid' => 'TisteSoft. S.A.',
            'password' => 'tistesoftsa',
            'hidden' => 'Whether the network is a hidden SSID or not.'
        ]);
    }
}