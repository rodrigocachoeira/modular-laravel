<?php

namespace App\Modules\Test\Entities\Repositories;

use App\Modules\Test\Entities\Models\Test;
use Orion\Core\Business\Repositories\Repository;

class TestRepository extends Repository
{

  /**
  * Método Construtor
  *
  * @param Test $entity
  */
  public function __construct (Test $entity)
  {
    $this->entity = $entity;
  }

}
