<?php

namespace App\Core\Console\Commands\Crud\Templates;

use App\Core\Console\Commands\Crud\Templates\Controller\ControllerConstruct;

class Template
{

  /**
  * Gerencia o template do controlador
  *
  * @var ControllerConstruct
  */
  private $controller;

  /**
  * Método de construcao
  *
  */
  public function __construct ()
  {
    $this->controller = new ControllerConstruct();
  }

  public function getController ()
  {
    return $this->controller;
  }

  /**
  * Manipula o arquivo padrao de configuracao
  * para o template final utilizando os devidos
  * valores
  *
  * @return boolean
  */
  public function mount ()
  {
    $this->controller->mount();
  }

}
