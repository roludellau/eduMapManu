<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Illuminate\View\View;

class schoolListController extends Controller
{
    private $client;
    public string $apiBaseUrl = 'https://data.education.gouv.fr';
    public string $apiRoute = '/api/v2/catalog/datasets/fr-en-annuaire-education/records';
    public string $departmentNumber = '78000';
    public string $apiQueryParams = '?limit=100&where=code_postal="78000" AND type_etablissement != "Service Administratif"';
    private array $schoolData;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->apiQueryParams = '?limit=100&where=code_postal=%22' . $this->departmentNumber . '%22%20AND%20type_etablissement%20=%20%22Ecole%22';
        $this->client = new Client(['base_uri' => $this->apiBaseUrl]);
        $this->fetchSchoolData();
    }

    /**
     * Récupère les données des écoles depuis l'API.
     *
     * @return Void
     */
    function fetchSchoolData(){
        $response = $this->client->request('GET', $this->apiRoute . $this->apiQueryParams);
        $this->schoolData = json_decode($response->getBody()->getContents())->records;
    }

    /**
     * Retourne une page HTML en incluant les données
     *
     * @return View
     */
    function renderView():View{
        return view('listeEcoles', ['schools' => $this->schoolData]);
    }
}
