<?php

namespace Acme\Controller;

use Acme\Classes\View;
use Acme\Model\MemberManager;
use Acme\Model\AccountManager;

class Connexion
{
  /*gere l inscription de nouveau membre et la redirection vers la page d'inscription*/

  public function stockNewMember($params)
  {
    $pseudo = htmlspecialchars($params['pseudo']);
    $pass_hash = password_hash($params['mdp'], PASSWORD_DEFAULT);
    $manager = new MemberManager();
    $stock = $manager->stockMdp($pseudo, $pass_hash);
    header("location:homepage");
  }

  public function login($params)
  {
    $pseudo = htmlspecialchars($params['pseudo']);
    $mdp = htmlspecialchars($params['mdp']);
    $manager = new MemberManager();
    $login = $manager->verifMdp($pseudo ,$mdp);
    header("location:homepage");
  }

  /*gere la redirection vers connexion et la verifaction de l identifiant et mot de passe*/
  public function showLogin($params)
  {
    $myView = new View('login');
    $myView->render(array());
  }


  /*gere le decryptage du mot de passe*/
  public function decrypt($params){
    $decrypt = KEY_DECRYPT;
    $id = $params['id'];
    $man = new AccountManager();
    $pass_hash = $man->decryptById($id);
    $pseudo = $man->pseudoById($id);
    $manager = new MemberManager();
    $decryptpass = $manager->encrypt_decrypt($decrypt, $pass_hash);
    $decryptAccount = array('pseudo' => $pseudo, 'mdp' => $decryptpass);
    echo json_encode($decryptAccount);
  }
  /*gere la deconnexion*/
  public function deco($params)
  {
    session_destroy();
    header("location:homepage");

  }

}
