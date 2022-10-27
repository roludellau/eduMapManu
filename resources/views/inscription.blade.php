@include('parts.header')

<div class="container text-center bandeauPresDispo">

    @if($success)
        <div class="alert alert-success">
            Votre compte à bien été créé
        </div>
    @endif

    @if($fail)
        <div class="alert alert-danger">
            Echec de la création du compte, veuillez réessayer
        </div>
    @endif


    <div class="row mt-5 pt-5">
        <h2 class="titre-section">
            Inscription
        </h2>
    </div>

    <form class="form" method="POST">
        @csrf
        <div class="form-group my-2" id="mailDiv">
          <label for="email">Adresse Mail</label>
          <input type="email" class="form-control mt-2 inputToCheck" id="email" name="email" aria-describedby="emailHelp" placeholder="Entrez votre adresse mail" value={{$defaultEmail}}>

        </div>
        <div class="form-group my-2 py-1" id="passwordDiv">
          <label for="password">Mot de passe</label>
          <input type="password" class="form-control mt-2 inputToCheck" id="password" name="password" placeholder="Entrez votre mot de passe" >
        </div>
        <div class="form-group my-2 py-1" id="passwordDiv2">
           <label for="password2">Confirmer le mot de passe</label>
           <input type="password" class="form-control mt-2 inputToCheck" id="password2" name="password2" placeholder="Entrez à nouveau votre mot de passe">
        </div>
        <button type="submit" id="submitButton" class="btn btn-primary mt-3" disabled>Je m'inscris</button>
    </form>

  </div>


<script src={{url('js/registrationForm.js')}}></script>

@include('parts.footer')
