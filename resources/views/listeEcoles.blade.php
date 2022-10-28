@include('parts.header')

    <h1 class="titre">Liste des écoles de Versailles</h1>
    <div class="containerFlex">
        <div id="map"></div>
    </div>
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
                    </ul>
                </div>
            @endforeach
            </div>


            <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js" integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg=" crossorigin=""></script>
            <script>
                @if ($lat && $long)
                    var map = L.map('map').setView([{{$lat}},{{$long}}], 14);
                    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                    }).addTo(map);
                    @foreach ($schools as $school)
                        var marker = L.marker([{{$school->record->fields->latitude}}, {{$school->record->fields->longitude}}]).addTo(map);
                        marker.bindPopup('<a href="/liste/{{$school->record->fields->identifiant_de_l_etablissement}}" target="_blank"><b>{{$school->record->fields->nom_etablissement}}</b></a><br>{{$school->record->fields->adresse_1}} {{$school->record->fields->adresse_2}}');
                    @endforeach
                @endif
            </script>

@include('parts.footer')
