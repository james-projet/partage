<?php
include('_config.php');

MyAutoload::start();
// url :    index.php?action=homepage    - index.php?action=contact     index.php

(isset($_GET['action'])) ? $action = $_GET['action'] : $action = "homepage";

// role de routeur
$routeur = new Routeur($action);
$routeur->renderController();
