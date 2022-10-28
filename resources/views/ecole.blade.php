@include('parts.header')


<div class="containerFlex">
    <div class="cardEcoleUnique">
        <h2 class="nomEtablissementUnique">
            {{$school->nom_etablissement}}
        </h2>

        <div class="informationsEcole">

            <ul class="listeInformations">
                @if ($school->ecole_maternelle)
                    <li class="elementlisteTypesEcoles fw-bold">
                        {{"Ecole maternelle"}}
                    </li>
                @endif
                @if ($school->ecole_elementaire)
                    <li class="elementlisteTypesEcoles fw-bold">
                        {{"Ecole élémentaire"}}
                    </li>
                @endif
                @if ($school->voie_generale)
                    <li class="elementlisteTypesEcoles fw-bold">
                        {{"Voie générale"}}
                    </li>
                @endif
                @if ($school->voie_technologique)
                    <li class="elementlisteTypesEcoles fw-bold">
                        {{"Voie technologique"}}
                    </li>
                @endif
            </ul>

            <ul class="listeInformations2">
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
