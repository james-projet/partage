<?php
class Routeur
{
  private $action;
  private $params;
  private $routes;

  public function __construct($url)
  {
    $element = explode('/', $url);
    $this->action = $element[0];
    $this->params = $this->extractParams($element);
    $this->routes = parse_ini_file("fichier.ini", true);
  }
  /**
  *Sert a extraire tous les element de l url et les stocker dans un tableau
  *$element = int,string
  *return params = array(int et ou string)
  **/
  public function extractParams($element)
  {
    unset($element[0]);
    $params_get = array();
    $params = array();
    if(isset($element[1]))
    {
      for($i = 1; $i <= count($element); $i++)
      {
          $params_get[$element[$i]] = $element[$i+1];
          $i++;
      }
    }
    $params = array_merge($params_get, $_POST);
    return $params;
  }

  /**
  *Sert a indiquer la bonne routes par rapport a l action de l utilisateur
  **/
  public function renderController()
  {
    $action = $this->action;
    if (key_exists($action, $this->routes))
    {
      $controller = $this->routes[$action]['controller'];
      $method     = $this->routes[$action]['method'];

      $currentController = new $controller();
      $currentController->$method($this->params);
    }
    else
    {
      echo '404';
    }
  }
}
