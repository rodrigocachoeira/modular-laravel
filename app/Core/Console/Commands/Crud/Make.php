<?php

namespace App\Core\Console\Commands\Crud;

use Illuminate\Console\Command;
use App\Core\Console\Commands\Crud\Usefuls\Convert;
use App\Core\Console\Commands\Crud\Templates\Template;
use Illuminate\Support\Facades\File;

class Make extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crud:make {bundle} {entity}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a simple crud';

    /**
    * Bundle of Crud
    *
    * @var String
    */
    protected $bundle;

    /**
    * Object de auxílio de conversões
    *
    * @var Convert
    */
    private $convert;

    /**
    * Entity
    *
    * @var String
    */
    private $entity;

    /**
    * Http information vector
    *
    * @var Array
    */
    private $html;

    /**
    * Objeto responsável por carregar
    * as informacoes de configuracao
    *
    * @var Loader
    */
    protected $loader;

    /**
    * Gerenciador de templates
    *
    * @var Template
    */
    protected $template;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->convert = new Convert();
        $this->loader = new Loader();
        $this->template = new Template();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      $this->bundle = ucfirst($this->argument('bundle'));
      $this->entity = ucfirst($this->argument('entity'));

      if (!$this->loader->onLoad()) {
        $this->error('Invalid JSON file: paths.json');
        return;
      }
      $this->http = $this->loader->paths->http;

      foreach ($this->loader->paths->paths as $key => $value) {
        $this->makeFile($key, $value);
      }
    }


    /**
    * Realiza a criação do arquivo do crud
    * de acordo com os valores passados
    *
    * @param String $type
    * @param String $value
    *
    * @return void
    */
    private function makeFile ($type, $value)
    {
      switch ($type) {
        case 'controller':
          $this->makeController($value);
          break;

        case 'page':
          $this->makePage($value);
          break;

        case 'model':
          # code...
          break;

        case 'request':
          # code...
          break;

        case 'view':
          # code...
          break;

        default:
          # code...
          break;
      }
    }

    /**
    * Realiza a criação de um controlador
    *
    * @param String $name
    *
    * @return void
    */
    private function makeController ($name)
    {
      $this->controllerDirectories();

      File::put(
          app_path($this->convert->namespaceToPath($name, $this->bundle, $this->entity, $this->http, true) . 'Controller.php'),
          $this->template->getController()->mount($this->bundle, $this->entity, $this->loader)->getContent()
      );
    }

    /**
    * Verifica se os diretorios padroes
    * estao criados, caso contrário realiza a ligacao
    *
    * @return void
    */
    private function controllerDirectories ()
    {
      foreach ($this->loader->paths->directories->bundle as $directory) {
        if (! is_dir(app_path($directory))) {
          mkdir(app_path($this->convert->replaceKey('bundle', $this->bundle, $directory)), 0700);
        }
      }
    }

    /**
    * Realiza a criacao de um objeto
    * que ira carregas suas devidas paginas
    * HTML
    *
    * @param String $page
    *
    * @return void
    */
    private function makePage ($name)
    {
      File::put(
        app_path($this->convert->namespaceToPath($name, $this->bundle, $this->entity, $this->http, false) . 'Page.php'),
        $this->template->getPage()->mount($this->bundle, $this->entity, $this->loader)->getContent()
      );
    }
}
