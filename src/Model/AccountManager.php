<?php

namespace Acme\Model;

class AccountManager extends BddManager
{
  public function accountById($id){
    $accounts = array();
    $bdd = $this->getBdd();
    $req = $bdd->prepare('SELECT * FROM account WHERE account_groupe=:id');
    $req->bindValue('id', $id);
    $req->execute();
    while ($donnees = $req->fetch())
    {
      $account = new Account();
      $account->setId($donnees['id']);
      $account->setAccount_name($donnees['account_name']);
      $account->setIdentifiant($donnees['identifiant']);
      $account->setAccount_mdp($donnees['account_mdp']);
      $account->setAccount_groupe($donnees['account_groupe']);
      $accounts[] = $account;
    };
    return $accounts;
  }

  public function decryptById($id){
    $bdd = $this->getBdd();
    $req = $bdd->prepare('SELECT account_mdp FROM account WHERE id=:id');
    $req->bindValue('id', $id);
    $req->execute();
    $donnees = $req->fetch();
    $pass_hash = $donnees['account_mdp'];
    return $pass_hash;
  }

  public function pseudoById($id){
    $bdd = $this->getBdd();
    $req = $bdd->prepare('SELECT identifiant FROM account WHERE id=:id');
    $req->bindValue('id', $id);
    $req->execute();
    $donnees = $req->fetch();
    $pseudo = $donnees['identifiant'];
    return $pseudo;
  }
}
