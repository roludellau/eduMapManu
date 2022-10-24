@include('parts/header')

    <h1>Hello, world!</h1>
        <ul>
            @foreach ($schools as $school)
                <li>
                    {{$school->$record->$fields->$nom_etablissement}}
                </li>
            @endforeach
        </ul>

@include('parts/footer')
