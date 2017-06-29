<?php

namespace App\Core\Console\Commands\Crud\Templates\Page;

use App\Core\Console\Commands\Crud\Usefuls\Convert;
use App\Core\Console\Commands\Crud\Usefuls\Inflector;

class PageConstruct
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

    return $this;
  }

  /**
  * Aplica os valores corretos no documento
  * de configuracao das páginas
  *
  * @param String $bundle
  * @param String $entity
  * @param Loader loader
  *
  * @return void
  */
  private function applyValues ($bundle, $entity, $loader)
  {
    $this->convert->change('namespace', $this->convert->changeKeys($loader->paths->http->page->namespace, ['bundle' => $bundle]), $this->content);
    $this->convert->change('page.name', $entity.'Page');
    $this->convert->change('bundle.upperCase', strtoupper($bundle));
    $this->convert->change('bundle', strtolower($bundle));
    $this->convert->change('entity', strtolower($entity));

    $this->content = $this->convert->getCache()->tempContent;
  }

  /**
  * Carrega o documento padrao de configuracao
  * da pagina
  *
  * @return String
  */
  private function loadConfigFile ()
  {
    return file_get_contents(app_path('Core/Console/Commands/Crud/Templates/Page/page'));
  }

}
