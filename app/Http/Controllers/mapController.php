<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mapController extends Controller
{
    //

    public function displayMap(){
        $coordonneesVersailles = ['lat'=> '48.801408','long'=>'2.130122'];

        return view('map',[
            'lat' => $coordonneesVersailles['lat'],
            'long' =>$coordonneesVersailles['long']
        ]);
    }
}
