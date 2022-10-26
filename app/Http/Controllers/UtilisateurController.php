<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Utilisateur;

class UtilisateurController extends Controller
{
    //


    function showAll(){
        foreach(Utilisateur::all() as $utilisateur){
            echo "prenom : ".$utilisateur->prenom."<br>";
        }
    }
}
