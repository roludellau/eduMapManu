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
     * Crée une nouvelle instance du controlleur.
     * Définit l'instance du Guzzle Client avec configs
     *
     * @return void
     */
    public function __construct()
    {
        $this->client = new Client(['base_uri' => $this->apiBaseUrl]);
    }


    /**
     * Fetch les données pour la liste des écoles
     * Retourne une page HTML en incluant les données
     *
     * @return View
     */
    function renderListView():View{
        $response = $this->client->request('GET', $this->apiRoute . $this->apiQueryParams);
        $this->schoolData = json_decode($response->getBody()->getContents())->records;
        // Pour la map
        $coordonneesVersailles = ['lat'=> '48.801408','long'=>'2.130122'];

        // Formatage des numéros de tel
        foreach ($this->schoolData as $school){
            $phoneNumber = $school->record->fields->telephone;
            if (substr($phoneNumber, 2, 1) !== ' '){
                $school->record->fields->telephone = trim(chunk_split($phoneNumber, 2, ' '));
            }
        }

        // Retourne la vue
        return view('listeEcoles', [
            'schools' => $this->schoolData,
            'lat' => $coordonneesVersailles['lat'],
            'long' =>$coordonneesVersailles['long']
        ]);
    }


    function renderEcole($identifiant){

        $this->apiQueryParams = "?where=identifiant_de_l_etablissement=\"".$identifiant."\"";
        $response = $this->client->request('GET', $this->apiRoute . $this->apiQueryParams);
        $this->schoolData = json_decode($response->getBody()->getContents())->records;

        // Formatage des numéros de tel
        $phoneNumber = $this->schoolData[0]->record->fields->telephone;
        if (substr($phoneNumber, 2, 1) !== ' '){
            $this->schoolData[0]->record->fields->telephone = trim(chunk_split($phoneNumber, 2, ' '));
        }

        // Dictionnaire avec 'donnée à afficher' => 'donnée dans le Json' pour boucler dans la vue
        $typesOfSchools = [
            'Ecole maternelle' => 'ecole_maternelle',
            'Ecole élémentaire' => 'ecole_elementaire',
            'Voie générale' => 'voie_generale',
            'Voie technologique' => 'voie_technologique',
            'Voie professionnelle' => 'voie_professionnelle',
        ];

        return view('ecole',[
            'school'=> $this->schoolData[0]->record->fields,
            'typesOfSchools' => $typesOfSchools
        ]);

    }
}
