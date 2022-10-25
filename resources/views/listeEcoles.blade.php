@include('parts.header')

    <h1 class="titre">Liste des écoles de Versailles</h1>
        <div class="containerFlex">
            @foreach ($schools as $school)
                <div class="cardEcole">
                    <p class="nomEtablissement">
                        {{$school->record->fields->nom_etablissement}}
                    </p>
                    <ul>
                        <li class="elementListeCard">
                            <label>Type d'établissement : </label>{{" ".$school->record->fields->type_etablissement}}
                        </li>
                        <li class="elementListeCard">
                            <label>adresse : </label>{{" ".$school->record->fields->adresse_1." ".$school->record->fields->adresse_2}}
                        </li>
                        <li class="elementListeCard">
                            <label>Contact : </label>{{" ".$school->record->fields->mail}}
                        </li>
                        <li class="elementListeCard">
                            <label>Telephone : </label>{{" ".$school->record->fields->telephone}}
                        </li>
                        <li class="elementListeCard">
                            <label>Telephone : </label>{{" ".$school->record->fields->telephone}}
                        </li>
                    </ul>
                </div>
            @endforeach
            </div>

@include('parts.footer')
