@include('parts.header')


<div class="containerFlex">
    <div class="cardEcoleUnique">
        <h2 class="nomEtablissementUnique">
            {{$school->nom_etablissement}}
        </h2>

        <div class="informationsEcole">

            <ul class="listeTypesEcoles">
                @foreach ($typesOfSchools as $typeToDisplay => $typeInData)
                    @if ($school->$typeInData)
                        <li class="elementlisteTypesEcoles fw-bold">
                            {{$typeToDisplay}}
                        </li>
                    @endif
                @endforeach
            </ul>

            <ul class="listeInformations">
                @if ($school->statut_public_prive)
                    <li class="elementListeCardUnique">
                        <label class="fw-bold">Statut : </label>
                        {{($school->statut_public_prive == 'Public' ? 'Ecole publique' : $school->statut_public_prive == 'Privé') ? 'Ecole privée' : null}}
                    </li>
                @endif
                <li class="elementListeCardUnique">
                    <label class="fw-bold">Adresse : </label>{{" ".$school->adresse_1." ".$school->adresse_2}}
                </li>
                <li class="elementListeCardUnique">
                    <label class="fw-bold">Email : </label>{{" ".$school->mail}}
                </li>
                <li class="elementListeCardUnique">
                    <label class="fw-bold">Telephone : </label>{{" " . $school->telephone}}
                </li>
                @if ($school->web)
                    <li class="elementListeCardUnique">
                        <label class="fw-bold">Site web : </label>{{" ".$school->web}}
                    </li>
                @endif
            </ul>

        </div>
    </div>
</div>

@include('parts.footer')
