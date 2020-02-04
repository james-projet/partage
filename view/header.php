<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
  <div class="container">
    <a class="navbar-brand js-scroll-trigger" href="<?= HOST?>homepage">Partage</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="<?= HOST?>homepage#about">A Propos</a>
        </li>
        <?php if(empty($_SESSION['pseudo'])):?>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="<?= HOST?>homepage#connexion">Connexion</a>
        </li>
        <?php endif;?>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="<?= HOST?>homepage#contact">Contact</a>
        </li>
        <?php if(isset($_SESSION['pseudo'])):?>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?= HOST?>newGroupe">Groupes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?= HOST?>deco">Déconnexion</a>
          </li>
          <p id="hello">Bonjour <?= $_SESSION['pseudo'];?></p>
        <?php endif;?>
      </ul>
    </div>
  </div>
</nav>
