@include('parts.header')

<div class="container text-center bandeauPresDispo">

    <div class="row mt-5 pt-5">
        <h2 class="titre-section">
            Connexion
        </h2>
    </div>

    <form class="form" method='POST'>
        @csrf
        <div class="form-group my-2 pb-1">
          <label for="exampleInputEmail1">Adresse Mail</label>
          <input type="email" name="email" class="form-control mt-2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez votre adresse mail">
        </div>
        <div class="form-group my-2 py-1">
          <label for="exampleInputPassword1">Mot de passe</label>
          <input type="password" name="password" class="form-control mt-2" id="exampleInputPassword1" placeholder="Entrez votre mot de passe">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Se connecter</button>
    </form>

  </div>



@include('parts.footer')
