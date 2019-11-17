<?php

class View
{

  private $template;

  public function __construct($template)
  {
    $this->template = $template;
  }
  /**
  *Sert a construire la vue
  *$datas = objet ou var
  **/
  public function render($datas = null)
  {
    extract($datas);
    ob_start();
    include(VIEW.$this->template.'.php');
    $content = ob_get_clean();
    include_once (VIEW.'gabarit.php');
  }
}
