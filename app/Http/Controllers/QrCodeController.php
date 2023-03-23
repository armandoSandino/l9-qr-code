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
}
