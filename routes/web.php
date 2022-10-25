<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use App\Http\Controllers\schoolListController;

$router->get('/', function(){
    return view('accueil');
});

$router->get('/liste', 'schoolListController@renderView');

$router->get('/inscription', function(){
    return view('inscription');
});

$router->get('/connexion', function(){
    return view('connexion');
});





/*
$router->get('/test', function (){
    $typeArray = [];
    $this->client = new Client(['base_uri' => 'https://data.education.gouv.fr']);
    $response = $this->client->request('GET', '/api/v2/catalog/datasets/fr-en-annuaire-education/records?limit=100&where=code_postal="78000"');
    $schoolData = json_decode($response->getBody()->getContents())->records;
    foreach ($schoolData as $school){
        $typeOfSchool = $school->record->fields->type_etablissement;
        if (!array_key_exists($typeOfSchool, $typeArray)){
            $typeArray[$typeOfSchool] = 1;
        } else {
            $typeArray[$typeOfSchool] += 1;
        }
    }
    return dd($typeArray);
});
*/
