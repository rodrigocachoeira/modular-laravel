<?php

namespace App\Core\Console\Commands\Crud\Templates;

use App\Core\Console\Commands\Crud\Templates\Controller\ControllerConstruct;
use App\Core\Console\Commands\Crud\Templates\Page\PageConstruct;

class Template
{

  /**
  * Gerencia o template do controlador
  *
  * @var ControllerConstruct
  */
  private $controller;

  /**
  * Gerencia o template de páginas
  *
  * @var PageConstruct
  */
  private $page;

  /**
  * Método de construcao
  *
  */
  public function __construct ()
  {
    $this->controller = new ControllerConstruct();
    $this->page = new PageConstruct();
  }

  public function getController ()
  {
    return $this->controller;
  }

  public function getPage ()
  {
      return $this->page;
  }

}
