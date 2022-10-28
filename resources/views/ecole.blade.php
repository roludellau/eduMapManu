@include('parts.header')


<div class="containerFlex">
    <div class="cardEcoleUnique">
        <h2 class="nomEtablissementUnique">
            {{$school[0]->record->fields->nom_etablissement}}
        </h2>

        <div class="informationsEcole">
            <ul class="listeInformations">
                <li class="elementListeCardUnique">
                    <label>Adresse : </label>{{" ".$school[0]->record->fields->adresse_1." ".$school[0]->record->fields->adresse_2}}
                </li>
                <li class="elementListeCardUnique">
                    <label>Contact : </label>{{" ".$school[0]->record->fields->mail}}
                </li>
                <li class="elementListeCardUnique">
                    <label>Telephone : </label>{{" ".$school[0]->record->fields->telephone}}
                </li>
            </ul>
        </div>
    </div>
</div>

@include('parts.footer')
