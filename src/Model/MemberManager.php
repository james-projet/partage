<?php

namespace Acme\Model;

class MemberManager extends BddManager
{
  /*stockage mdp inscription*/
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

  function encrypt_decrypt($action, $string) {
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $secret_key = SCRT_KEY;
    $secret_iv = SCRT_IV;
    // hash
    $key = hash('sha256', $secret_key);

    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    if ( $action == 'encrypt' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if( $action == 'decrypt' ) {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
    return $output;
  }



  public function recupIdVisiteur($pseudo){
      $bdd = $this->getBdd();
      $req = $bdd->prepare('SELECT id FROM visiteurs WHERE pseudo=:pseudo');
      $req->bindValue('pseudo', $pseudo);
      $req->execute();
      $donnees = $req->fetch();
      $visiteur_id = $donnees['id'];
      return $visiteur_id;
  }
}
