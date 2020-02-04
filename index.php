<?php
include('_config.php');
session_start();
require 'vendor/autoload.php';
use Acme\Classes\Routeur;
//MyAutoload::start();
// url :    index.php?action=homepage    - index.php?action=contact     index.php

(isset($_SERVER['PATH_INFO'])) ? $action = $_SERVER['PATH_INFO'] : $action = "/homepage";
// role de routeur
$routeur = new Routeur($action);
$routeur->renderController();
