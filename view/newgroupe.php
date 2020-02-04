<figure>
  <img   id="img-banniere" src="/libre/images/img-groupe.jpg"  alt="groupe"/>
  <figcaption>
    <div class="container text-center">
      <h1>Groupes</h1>
      <p class="lead">La page où sont réunies tous tes groupes</p>
    </div>
  </figcaption>
</figure>

<section id="about">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 mx-auto">
        <h2>Comment utiliser un groupe ?</h2>
        <p class="lead">tous nos partage de compte fonctionne par groupe crée ou rejoint un groupe pour partager et utiliser des comptes.</p>
      </div>
    </div>
  </div>
</section>

<section id="services" class="bg-light">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 mx-auto">
        <h2>Mes groupes</h2>
        <?php foreach ($groupes as $groupe): ?>
        <p><a href="<?= HOST?>showGroupe/id/<?=$groupe->getGroupe_id()?>"><?= $groupe->getGroupe_name()?></a></p>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<section id="contact">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 mx-auto">
        <h2>Créer ou rejoindre un groupe</h2>
        <div id="groupe">
          <div id="newgroupe">
            <p>créer un groupe</p>
            <form class="" action="<?= HOST?>stockNewGroupe" method="post">
                <div class="form-group">
                  <label for="pseudo">Nom du groupe</label>
                  <input type="pseudo" class="form-control" name="groupe" aria-describedby="emailHelp" placeholder="Nom du groupe" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Mot de passe</label>
                  <input type="password" class="form-control" name="mdp" placeholder="Mot de passe" required>
                </div>
                <button type="submit" class="btn btn-primary">Envoi</button>
            </form>
          </div>
          <div id="joingroupe">
            <p>rejoindre un groupe</p>
            <form action="<?= HOST?>joinGroupe" method="post">
              <div class="form-group">
                <label for="pseudo">Nom du groupe</label>
                <input type="pseudo" class="form-control" name="groupe" aria-describedby="emailHelp" placeholder="Nom du groupe" required>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Mot de passe</label>
                <input type="password" class="form-control" name="mdp" placeholder="Mot de passe" required>
              </div>
              <button type="submit" class="btn btn-primary">Envoi</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
