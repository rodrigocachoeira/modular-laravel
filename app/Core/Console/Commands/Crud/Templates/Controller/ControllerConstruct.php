<?php

namespace App\Core\Console\Commands\Crud\Templates\Controller;

use App\Core\Console\Commands\Crud\Usefuls\Convert;

class ControllerConstruct
{

  /**
  * @var String
  */
  protected $content;

  /**
  * Classe de conversao
  *
  * @var Convert
  */
  protected $convert;

  public function __construct ()
  {
    $this->convert = new Convert();
    $this->convert->setCache(true);
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
    $this->content = $this->loadConfigFile();
    $this->applyValues();

    dd($this->content);
  }

  /**
  * Aplica os valores corretos no documento
  * de configuracao dos controladores
  *
  * @return void
  */
  private function applyValues ()
  {
    $this->convert->change('namespace', 'Hello', $this->content);

    $this->content = $this->convert->getCache()->tempContent;
  }

  /**
  * Carrega o documento padrao de configuracao
  * do controlador
  *
  * @return String
  */
  private function loadConfigFile ()
  {
    return file_get_contents(app_path('Core/Console/Commands/Crud/Templates/Controller/controller'));
  }

}
