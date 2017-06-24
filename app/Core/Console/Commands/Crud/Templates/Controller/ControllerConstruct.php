<?php

namespace App\Core\Console\Commands\Crud\Templates\Controller;

use App\Core\Console\Commands\Crud\Usefuls\Convert;
use App\Core\Console\Commands\Crud\Usefuls\Inflector;

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
  * Retorna o conteudo
  *
  * @return String
  */
  public function getContent ()
  {
    return $this->content;
  }

  /**
  * Manipula o arquivo padrao de configuracao
  * para o template final utilizando os devidos
  * valores
  *
  * @param String $bundle
  * @param String $entity
  * @param Loader loader
  *
  * @return boolean
  */
  public function mount ($bundle, $entity, $loader)
  {
    $this->content = $this->loadConfigFile();
    $this->applyValues($bundle, $entity, $loader);

    //dd($this->content);
    return $this;
  }

  /**
  * Aplica os valores corretos no documento
  * de configuracao dos controladores
  *
  * @param String $bundle
  * @param String $entity
  * @param Loader loader
  *
  * @return void
  */
  private function applyValues ($bundle, $entity, $loader)
  {
    $this->convert->change('controller.main.namespace', $loader->paths->http->main->namespace, $this->content);
    $this->convert->change('controller.main.name', $loader->paths->http->main->name);
    $this->convert->change('namespace', $this->convert->changeKeys($loader->paths->http->namespace, ['bundle' => $bundle]));
    $this->convert->change('controller', Inflector::pluralize($entity).'Controller');
    $this->convert->change('controller.repository', strtolower($entity).'Repository');
    $this->convert->change('controller.caps.repository', $entity.'Repository');

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
