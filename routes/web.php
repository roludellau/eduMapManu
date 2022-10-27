<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\schoolListController;
use App\Http\Controllers\userController;
use App\Models\Utilisateur;
use App\Models\User;
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

//Accueil
$router->get('/', function(){return view('accueil');});

//Liste des écoles
$router->get('/liste', [schoolListController::class,'renderView'])->middleware('auth');

//Page inscription
$router->get('/inscription', function(){
    return view('inscription', [
        'defaultEmail' => '',
        'success'=>false,
        'fail'=>false
    ]);
})->middleware('guest');


//Validation inscription
$router->post('/inscription', [userController::class, 'validateRegistration'])->middleware('guest');


//Page connexion
$router->get('/connexion', function(){return view('connexion');})->name('login')->middleware('guest');
$router->post('/connexion',[userController::class,'connexion'])->middleware('guest');

$router->get('/logout',[userController::class,'logout'])->middleware('auth');
