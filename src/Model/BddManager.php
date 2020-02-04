<?php

namespace Acme\Model;

use PDO;

abstract class BddManager
{
  private $bdd;

  public function __construct()
  {
      $this->bdd = new PDO('mysql:host=localhost;dbname=partage;charset=utf8', 'root', DB_PWD);
  }

  public function getBdd()
  {
      return $this->bdd;
  }
}
