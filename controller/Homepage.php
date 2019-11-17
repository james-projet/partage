<?php

class Homepage
{
  public function showHomepage($params)
  {
    $myView = new View('homepage');
    $myView->render(array());
  }

  public function showNewMember($params)
  {
    $myView = new View('newMember');
    $myView->render(array());
  }

  public function stockNewMember($params)
  {
    $pseudo = htmlspecialchars($params['pseudo']);
    $pass_hash = password_hash($params['mdp'], PASSWORD_DEFAULT);
    $manager = new MemberManager();
    $stock = $manager->stockMdp($pseudo, $pass_hash);
    header("location:homepage");
  }

  public function showLogin($params)
  {
    $myView = new View('login');
    $myView->render(array());
  }

  public function login($params)
  {
    $pseudo = $params['pseudo'];
    $mdp = $params['mdp'];
    $manager = new MemberManager();
    $login = $manager->verifMdp($pseudo ,$mdp ,$good);
    if (isset($_SESSION['pseudo']))
    {
      $_SESSION['flashMessage'] = "bonjour " . $pseudo;
    }
    header("location:homepage");
  }

  public function deco($params)
  {
    session_destroy();
    header("location:homepage");
  }

  public function showNewGroupe($params)
  {
    $myView = new View('newGroupe');
    $myView->render(array());
  }

  public function stockNewGroupe($params)
  {
    $pseudo = $_SESSION['pseudo'];
    $groupe = htmlspecialchars($params['groupe']);
    $pass_hash = password_hash($params['mdp'], PASSWORD_DEFAULT);
    $manager = new GroupeManager();
    $stock = $manager->stockGroupe($groupe, $pass_hash, $pseudo);
    header("location:homepage");
  }

  public function joinGroupe($params)
  {
    $groupe = $params['groupe'];
    $mdp = $params['mdp'];
    $manager = new GroupeManager();
    $login = $manager->verifGroupe($groupe ,$mdp);
    if (isset($_SESSION['groupe']))
    {
      $_SESSION['flashMessage'] = "bienvenue chez " . $groupe;
    }
    header("location:homepage");
  }

  public function showGroupe($params)
  {
    $id = $params['id'];
    $manager = new GroupeManager();
    $groupeById = $manager->groupeById($id);
    $myView = new View('groupe');
    $myView->render(array('groupeById' => $groupeById, 'id' =>$id));
  }

  public function newAccount($params)
  {
    $groupe_id = $params['groupe_id'];
    $identifiant = htmlspecialchars($params['identifiant']);
    $mdp = password_hash($params['mdp'], PASSWORD_DEFAULT);
    $account_name = $params['account_name'];
    $manager = new GroupeManager();
    $stockage = $manager->stockageAccount($account_name, $identifiant, $mdp, $groupe_id);
    header("location:showGroupe/id/$groupe_id");

  }

}
