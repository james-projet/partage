<?php

namespace Acme\Model;

class GroupeManager extends BddManager
{
  public function stockGroupe($groupe ,$pass_hash, $pseudo)
  {
    $bdd = $this->getBdd();
    $req = $bdd->prepare('INSERT INTO groupes(groupe_nom, groupe_mdp) VALUES(:groupe_nom, :groupe_mdp)');
    $req->execute(array(
      'groupe_nom' => $groupe,
      'groupe_mdp'   => $pass_hash,
    ));

    /*insere le groupe a l'utilisateur correspondant*/
    $requete = $bdd->prepare('UPDATE visiteurs SET visiteur_groupe = :visiteur_groupe WHERE pseudo = :pseudo');
    $requete->execute(array(
      'visiteur_groupe' => $groupe,
      'pseudo'   => $pseudo
    ));
    return $this;
  }

  public function recupIdGroupe($groupe_nom){
    $bdd = $this->getBdd();
    $req = $bdd->prepare('SELECT id FROM groupes WHERE groupe_nom=:groupe_nom');
    $req->bindValue('groupe_nom', $groupe_nom);
    $req->execute();
    $donnees = $req->fetch();
    $groupe_id = $donnees['id'];
    return $groupe_id;
  }


  public function utlisateurGroupe($groupe_id ,$visiteur_id ,$groupe_nom){
    $bdd = $this->getBdd();
    $req = $bdd->prepare('INSERT INTO compteutilisateur(groupe_id, utilisateur_id, groupe_name) VALUES(:groupe_id, :visiteur_id, :groupe_name)');
    $req->execute(array(
      'groupe_id' => $groupe_id,
      'visiteur_id'   => $visiteur_id,
      'groupe_name' => $groupe_nom,
    ));
  }

  public function verifGroupe($groupe ,$mdp)
  {
    $bdd = $this->getBdd();
    $req = $bdd->prepare('SELECT id, groupe_mdp FROM groupes WHERE groupe_nom = :groupe_nom');
    $req->execute(array('groupe_nom' => $groupe));
    $identifiant = $req->fetch();
    if (!$identifiant)
    {
        echo "Mauvais identifiant ou mot de passe !";
    }
    else
    {
      if (password_verify($mdp, $identifiant['groupe_mdp']))
      {
        $_SESSION['id'] = $identifiant['id'];
        $_SESSION['groupe'] = $groupe;
        return $_SESSION['id'];
        return $_SESSION['groupe'];
      }
      else
      {
        echo "mauvais identifiant ou mot de passe !";
      }
    }
  }

  public function compteUtilisateurById($visiteur_id)
  {
    $groupes = [];
    $bdd = $this->getBdd();
    $query = "SELECT groupe_id, groupe_name FROM compteutilisateur WHERE utilisateur_id=:id";
    $reponse = $bdd->prepare($query);
    $reponse->bindValue('id', $visiteur_id);
    $reponse->execute();
    while ($donnees = $reponse->fetch())
    {
      $groupe = new CompteUtilisateur();
      $groupe->setGroupe_id($donnees['groupe_id']);
      $groupe->setGroupe_name($donnees['groupe_name']);
      $groupes[] = $groupe;
    };

    return $groupes;
  }

  public function groupeById($id)
  {
    $bdd = $this->getBdd();
    $query = "SELECT id, groupe_nom FROM groupes WHERE id=:id";
    $reponse = $bdd->prepare($query);
    $reponse->bindValue('id', $id);
    $reponse->execute();
    $donnees = $reponse->fetch();
    $groupe = new Groupe();
    $groupe->setId($donnees['id']);
    $groupe->setGroupe_nom($donnees['groupe_nom']);
    return $groupe;
  }

  public function stockageAccount($account_name, $identifiant, $mdp, $groupe_id)
  {
    $bdd = $this->getBdd();
    $req = $bdd->prepare('INSERT INTO account (account_name, identifiant, account_mdp, account_groupe) VALUES(:account_name, :identifiant, :account_mdp, :account_groupe)');
    $req->execute(array('account_name' => $account_name,
                        'identifiant' => $identifiant,
                        'account_mdp' => $mdp,
                        'account_groupe' => $groupe_id));

    return $this;
  }
}
