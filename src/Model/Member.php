<?php

namespace Acme\Model;

class Member{

  private $id;
  private $pseudo;
  private $mdp;
  private $visiteur_groupe;

  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function setPseudo($pseudo)
  {
    $this->pseudo = $pseudo;
  }

  public function getPseudo()
  {
    return $pseudo->pseudo;
  }

  public function getMdp()
  {
    return $this->mdp;
  }

  public function setMdp($mdp)
  {
    $this->mdp = $mdp;
  }

  public function getVisiteur_groupe()
  {
    return $this->visiteur_groupe;
  }

  public function setVisiteur_groupe($visiteur_groupe)
  {
    $this->visiteur_groupe = $visiteur_groupe;
  }

}
