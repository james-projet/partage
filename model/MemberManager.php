<?php

class MemberManager extends BddManager
{
  public function stockMdp($pseudo ,$pass_hash)
  {
    $bdd = $this->getBdd();
    $req = $bdd->prepare('INSERT INTO visiteurs(pseudo, visiteur_mdp) VALUES(:pseudo, :visiteur_mdp)');
    $req->execute(array(
      'pseudo' => $pseudo,
      'visiteur_mdp'   => $pass_hash,
    ));

    return $this;
  }

  public function verifMdp($pseudo ,$mdp)
  {
    $bdd = $this->getBdd();
    $req = $bdd->prepare('SELECT id, visiteur_mdp FROM visiteurs WHERE pseudo = :pseudo');
    $req->execute(array('pseudo' => $pseudo));
    $identifiant = $req->fetch();
    if (!$identifiant)
    {
        echo "Mauvais identifiant ou mot de passe !";
    }
    else
    {
      if (password_verify($mdp, $identifiant['visiteur_mdp']))
      {
        $_SESSION['id'] = $identifiant['id'];
        $_SESSION['pseudo'] = $pseudo;
        return $_SESSION['id'];
        return $_SESSION['pseudo'];
      }
      else
      {
        echo "mauvais identifiant ou mot de passe !";
      }
    }
  }
}
