<?php

namespace Acme\Controller;

use Acme\Classes\View;
use Acme\Model\GroupeManager;
use Acme\Model\MemberManager;
use Acme\Model\AccountManager;

class Groupes
{
  /*gere la redirection vers la page groupe et la creation d'un groupe*/
  public function showNewGroupe($params)
  {
    $pseudo = $_SESSION['pseudo'];
    $manager = new MemberManager;
    $visiteur_id = $manager->recupIdVisiteur($pseudo);
    $managerGroupe = new GroupeManager;
    $groupes = $managerGroupe->compteUtilisateurById($visiteur_id);
    $myView = new View('newgroupe');
    $myView->render(array('groupes' => $groupes));
  }

  public function stockNewGroupe($params)
  {
    $pseudo = $_SESSION['pseudo'];
    $groupe = htmlspecialchars($params['groupe']);
    $pass_hash = password_hash($params['mdp'], PASSWORD_DEFAULT);
    $man = new MemberManager();
    $visiteur_id = $man->recupIdVisiteur($pseudo);
    $manager = new GroupeManager();
    $stock = $manager->stockGroupe($groupe, $pass_hash, $pseudo);
    $groupe_id = $manager->recupIdGroupe($groupe);
    $join = $manager->utlisateurGroupe($groupe_id ,$visiteur_id ,$groupe);
    header("location:newGroupe");
  }

  /*gere la connexion a un groupe */
  public function joinGroupe($params)
  {
    $pseudo = $_SESSION['pseudo'];
    $groupe_nom = htmlspecialchars($params['groupe']);
    $mdp = htmlspecialchars($params['mdp']);
    $man = new MemberManager();
    $visiteur_id = $man->recupIdVisiteur($pseudo);
    $manager = new GroupeManager();
    $groupe_id = $manager->recupIdGroupe($groupe_nom);
    $login = $manager->verifGroupe($groupe_nom ,$mdp);
    $join = $manager->utlisateurGroupe($groupe_id ,$visiteur_id ,$groupe_nom);
    $id = $_SESSION['id'];
    header("location:showGroupe/id/$id");
  }

  /*gere la connexion au groupe si on c est deja connecter au groupe*/
  public function showGroupe($params)
  {
    $id = $params['id'];
    $manager = new GroupeManager();
    $groupeById = $manager->groupeById($id);
    $man = new AccountManager();
    $accounts = $man->accountById($id);
    $myView = new View('groupe');
    $myView->render(array('groupeById' => $groupeById, 'id' =>$id, 'accounts' =>$accounts));
  }

  /*gere la creation d'un partage de compte*/
  public function newAccount($params)
  {
    $crypt = KEY_CRYPT;
    $groupe_id = $params['groupe_id'];
    $identifiant = htmlspecialchars($params['identifiant']);
    $pass = htmlspecialchars($params['mdp']);
    $account_name = htmlspecialchars($params['account_name']);
    $man = new MemberManager();
    $pass_hash = $man->encrypt_decrypt($crypt, $pass);
    $manager = new GroupeManager();
    $stockage = $manager->stockageAccount($account_name, $identifiant, $pass_hash, $groupe_id);
    header("location:showGroupe/id/$groupe_id");
  }


}
