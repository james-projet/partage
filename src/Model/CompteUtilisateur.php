<?php

namespace Acme\Model;

class CompteUtilisateur{

  private $groupe_id;
  private $utilisateur_id;
  private $groupe_name;


  public function getGroupe_id()
  {
    return $this->groupe_id;
  }

  public function setGroupe_id($groupe_id)
  {
    $this->groupe_id = $groupe_id;
  }

  public function setUtilisateur_id($utilisateur_id)
  {
    $this->utilisateur_id = $utilisateur_id;
  }

  public function getUtilisateur_id()
  {
    return $this->utilisateur_id;
  }

  public function setGroupe_name($groupe_name)
  {
    $this->groupe_name = $groupe_name;
  }

  public function getGroupe_name()
  {
    return $this->groupe_name;
  }
}
