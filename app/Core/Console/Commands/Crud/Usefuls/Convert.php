<?php

namespace App\Core\Console\Commands\Crud\Usefuls;

use App\Core\Console\Commands\Crud\Usefuls\Inflector;

class Convert
{

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {}

    /**
    * Converte o namespace informado
    * para o caminho do documento
    *
    * @param String $namespace
    * @param String $bundle
    * @param String $entity
    * @param Array $preLoader
    *
    * @return String
    */
    public function namespaceToPath ($namespace, $bundle, $entity, $preLoader)
    {
      return str_replace('\\', '/', str_replace('{bundle}', $bundle, $namespace)).'/'. Inflector::pluralize($entity).'Controller.php';
    }
}
