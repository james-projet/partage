<?php

namespace Acme\Model;

class Account{

  private $id;
  private $account_name;
  private $identifiant;
  private $account_mdp;
  private $account_groupe;


  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function setAccount_name($account_name)
  {
    $this->account_name = $account_name;
  }

  public function getAccount_name()
  {
    return $this->account_name;
  }

  public function getIdentifiant()
  {
    return $this->identifiant;
  }

  public function setIdentifiant($identifiant)
  {
    $this->identifiant = $identifiant;
  }

  public function setAccount_mdp($account_mdp)
  {
    $this->account_mdp = $account_mdp;
  }

  public function getAccount_mdp()
  {
    return $this->account_mdp;
  }

  public function setAccount_groupe($account_groupe)
  {
    $this->account_groupe = $account_groupe;
  }

  public function getAccount_groupe()
  {
    return $this->account_groupe;
  }

}
