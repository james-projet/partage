<form id="form-login" action="<?= HOST?>stockNewMember" method="post">
    <div class="form-group">
      <label for="pseudo">Pseudo</label>
      <input type="pseudo" class="form-control" name="pseudo" aria-describedby="emailHelp" placeholder="Pseudo" required>
    </div>
    <div class="form-group">
      <label for="mdp">Mot de Passe</label>
      <input type="password" class="form-control" name="mdp"  placeholder="Mot de passe" required>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Confirmation mot de passe</label>
      <input type="password" class="form-control" name="mdp2" placeholder="Mot de passe" required>
    </div>
      <button type="submit" class="btn btn-primary">Envoi</button>
  </form>
