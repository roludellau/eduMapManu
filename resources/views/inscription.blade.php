@include('parts.header')

<div class="container text-center bandeauPresDispo">

    <div class="row mt-5 pt-5">
        <h2 class="titre-section">
            Inscription
        </h2>
    </div>

    <form class="form" method="POST">
        <div class="form-group my-2" id="mailDiv">
          <label for="email">Adresse Mail</label>
          <input type="email" class="form-control mt-2 inputToCheck" id="email" name="email" aria-describedby="emailHelp" placeholder="Entrez votre adresse mail" value={{$defaultEmail}}>

        </div>
        <div class="form-group my-2 py-1" id="passwordDiv">
          <label for="password">Mot de passe</label>
          <input type="password" class="form-control mt-2 inputToCheck" id="password" name="password" placeholder="Entrez votre mot de passe" value={{$defaultPassword}}>
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
