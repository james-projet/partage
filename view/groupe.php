<!-- Page Content -->
<div class="container">

  <!-- Jumbotron Header -->
  <header id="hd-groupe" class="jumbotron my-4">
    <h1 class="display-3">Bienvenue dans Ton groupe</h1>
    <p class="lead">Tu peux inviter des membres et commencer a partager des comptes avec eux</p>
  </header>

  <!-- Page Features -->
  <form id="form-groupe" action="<?= HOST?>newAccount" method="post">
    <div class="form-group">
      <label for="pseudo">Nom du compte</label>
      <input type="pseudo" class="form-control" name="account_name" aria-describedby="emailHelp" placeholder="nom du compte" required>
    </div>
    <div class="form-group">
      <label for="pseudo">Identifiant</label>
      <input type="pseudo" class="form-control" name="identifiant" aria-describedby="emailHelp" placeholder="identifiant" required>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Mot de passe</label>
      <input type="password" class="form-control" name="mdp" placeholder="mot de passe" required>
    </div>
      <button type="submit" class="btn btn-primary">Envoi</button>
      <input type="hidden" name="groupe_id" value="<?= $id;?>">
  </form>
  <div class="account">
    <?php foreach ($accounts as $account): ?>
      <div class="card-account">
        <div class="card h-100">
          <img class="card-img-top" src="/libre/images/img-account.jpg" alt="">
          <div class="card-body">
            <h4 class="card-title"><?= $account->getAccount_name()?></h4>
            <p class="card-text">profite de <?= $account->getAccount_name()?> gratuitement</p>
          </div>
          <div class="card-footer">
              <button type="button" data-id="<?= $account->getId()?>" class="btn btn-primary identifiant">Voir les identifiants</button>
            </form>
          </div>
          <div class="card-footer">
            <span id="pseudo-<?= $account->getId()?>"></span><br>
            <span id="password-<?= $account->getId()?>"></span>
          </div>
        </div>
    </div>
  <?php endforeach; ?>
  </div>
</div>
