<?php

namespace Orion\Mail\Business\Repositories;

use Orion\Mail\Enntities\ConfigEmail;

/**
 * Repository for Config Email Model
 *
 * @class ConfigEmailRepository
 *
 * @author  Rodrigo Cachoeira <rodrigocachoeira11@gmail.com>
 */
class ConfigEmailRepository extends AppRepository
{

  /**
  * @var ConfigEmail
  */
  protected $entity;

  /**
  * Método Construtor
  *
  * @param ConfigEmail $entity
  */
  public function __construct(ConfigEmail $entity)
  {
    $this->entity = $entity;
  }

}
