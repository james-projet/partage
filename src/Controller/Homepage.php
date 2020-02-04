<?php

namespace Acme\Controller;

use Acme\Classes\View;

class Homepage
{
  public function showHomepage($params)
  {
    $myView = new View('homepage');
    $myView->render(array());
  }

  public function showConf($params)
  {
    $myView = new View('conf');
    $myView->render(array());
  }

  public function sendMail($params)
  {
    //ini_set("SMTP","ssl:smtp.free.fr");
    //ini_set("smtp_port","465");
    $from = $params['email'];
    $to = "james.gaffe@yahoo.fr";
    $subject = $params['titre'];
    $message = $params['message'];
    $headers = "From:" . $from;
    mail($to, $subject, $message, $headers);
    header("location:homepage");
  }

}
