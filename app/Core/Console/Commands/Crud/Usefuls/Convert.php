<?php

namespace App\Core\Console\Commands\Crud\Usefuls;

use App\Core\Console\Commands\Crud\Usefuls\Inflector;

class Convert
{

    /**
    * Variável temporável de armazenamento
    *
    * @var String
    */
    private $tempContent;

    /**
    * flag responsável por manter cache
    * para o documento temporário
    *
    * @var boolean
    */
    private $cache;

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

    /**
    * Troca as chaves encontradas por seus
    * respectivos valores
    *
    * @param String $value
    * @param Array $elements
    *
    * @return String
    */
    public function changeKeys ($value, $elements)
    {
      $newValue = $value;
      foreach ($elements as $key => $element) {
        $newValue = str_replace('{'.$key.'}', $element, $newValue);
      }
      return $newValue;
    }

    /**
    * Limpa qualquer cache armazenado pela
    * classe
    */
    public function clearCache ()
    {
      $this->tempContent = '';
    }

    /**
    * Define se a classe irá armazenar
    * cache
    *
    * @param boolean $storage
    *
    * @return Convert
    */
    public function setCache ($cache)
    {
      $this->cache = $cache;
      return $this;
    }

    /**
    * Troca uma palavra chave do documento
    * de configuracao pelo valor real
    *
    * @param String $target
    * @param String $to
    *
    * @return String
    */
    public function change ($target, $to, $content = null)
    {
      $content = str_replace('{'.$target.'}', $to, is_null($content) ? $this->tempContent : $content);
      if ($this->cache) {
        $this->tempContent = $content;
      }
    }

    /**
    * Retorna o cache da classe
    *
    * @return Object
    */
    public function getCache ()
    {
      $class = new \StdClass();
      $class->tempContent = $this->tempContent;

      return $class;
    }
}
