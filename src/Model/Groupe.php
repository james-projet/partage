<?php

namespace Acme\Model;

class Groupe{

  private $id;
  private $groupe_nom;
  private $groupe_mdp;

  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function setGroupe_nom($groupe_nom)
  {
    $this->groupe_nom = $groupe_nom;
  }

  public function getGroupe_nom()
  {
    return $this->groupe_nom;
  }

  public function getMdp()
  {
    return $this->mdp;
  }

  public function setMdp($mdp)
  {
    $this->mdp = $mdp;
  }

}
