<figure>
  <img   id="img-banniere" src="/libre/images/img-banniere.jpg"  alt="Terre connexion"/>
  <figcaption>
    <div class="container text-center">
      <h1 data-text="Partage"><span>Partage</span></h1>
      <p class="lead">Le site de partage de compte entre amis</p>
    </div>
  </figcaption>
</figure>

<section id="about">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 mx-auto">
        <h2>Comment Partager?</h2>
        <p class="lead">Pour partager tes comptes avec ton entourage 3 étapes simple:</p>
        <ul>
          <li>créer un compte</li>
          <li>créer un groupe</li>
          <li>invite tes potes</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<section id="connexion" class="bg-light">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 mx-auto">
        <h2>Connecte toi</h2>
        <div class="connexion">
          <form action="<?= HOST?>login" method="post">
            <div class="form-group">
              <label for="pseudo">Entre ton pseudo</label>
              <input type="pseudo" class="form-control" name="pseudo" aria-describedby="emailHelp" placeholder="Pseudo" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Mot de passe</label>
              <input type="password" class="form-control" name="mdp" placeholder="Mot de passe" required>
            </div>
            <button type="submit" class="btn btn-primary">Envoi</button>
          </form>
        <p>si tu n'a pas de compte <a href="<?= HOST?>showLogin">inscris toi</a></p>

      </div>
    </div>
  </div>
</section>

<section id="contact">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 mx-auto">
        <h2>Contact</h2>
        <p class="lead">Si tu as des questions ou des idées pour nous aider a nous developper contacte nous par e-mail</p>
        <form class="form-group" action="<?= HOST?>mail" method="post">
          <p>Contact</p>
          <div class="form-group">
              <input class="form-control" placeholder="titre" type="text" name="titre"  required/>
          </div>
          <div class="form-group">
              <input class="form-control" placeholder="email@exemple.fr" type="email" name="email" required/>
          </div>
          <div class="form-group">
              <textarea class="form-control" placeholder="message" type="text" name="message" required></textarea>
          </div>
          <div class="form-group">
              <button type="submit" class="btn btn-primary">Envoi</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
