<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EdukaMaps</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="{{url('css/main.css')}}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Playfair+Display+SC&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>

<body>
    <div class="allButFooter">
        <header>
            <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark py-3">
            <a class="navbar-brand ms-3 me-4 fs-4" href="#">Education Versailles</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active ps-2">
                    <a class="nav-link" href="/">Accueil <span class="sr-only"></span></a>
                </li>
                <li class="nav-item ps-1">
                    <a class="nav-link" href="/liste">Liste</a>
                </li>
                <li class="nav-item dropdown ps-1">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Mon Compte
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                       <a class="dropdown-item" href="/inscription">Inscription</a>
                       <a class="dropdown-item" href="/connexion">Connexion</a>
                       <a class="dropdown-item" href="#">Déconnexion</a>
                       <div class="dropdown-divider"></div>
                       <a class="dropdown-item" href="#">Profil</a>
                    </div>
                  </li>
                </ul>
            </div>
            </nav>
        </header>
