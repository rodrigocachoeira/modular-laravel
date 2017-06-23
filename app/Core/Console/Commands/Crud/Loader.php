<?php

namespace App\Core\Console\Commands\Crud;

class Loader
{

  /**
  * Contém as configuracoes essenciais
  * para o funcionamento da rotina
  *
  * @var Object
  */
  public $paths;

  /**
  * Carrega as informacoes essenciais
  * para o funcionamento da rotina
  *
  * @return boolean
  */
  private function paths ()
  {
    $this->paths = $this->collectPathsJSON();
    if (is_null($this->paths)) {
      $this->error('Invalid JSON file: paths.json');
      return false;
    }
    return true;
  }

  /**
  * Retorna os endereçoes de configuração
  * dos arquivos que serão criados
  *
  * @return Array
  */
  private function collectPathsJSON ()
  {
    return json_decode(file_get_contents(app_path('Core/Console/Commands/Crud/Config/paths.json')));
  }

  /**
  * Carrega as informacoes necessarioas
  * para dar start a configuracao do amiente
  *
  * @return boolean
  */
  public function onLoad ()
  {
    return $this->paths();
  }

}
