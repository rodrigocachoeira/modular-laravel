<?php

namespace Orion\Mail\Business\Repositories;

use Orion\Mail\Enntities\ConfigEmailSignature;

/**
 * Repository for Config Email Model
 *
 * @class ConfigEmailRepository
 *
 * @author  Rodrigo Cachoeira <rodrigocachoeira11@gmail.com>
 */
class ConfigEmailSignatureRepository extends AppRepository
{

  /**
  * @var ConfigEmailSignature
  */
  protected $entity;

  /**
  * @param ConfigEmailSignature $entity
  */
  public function __construct(ConfigEmailSignature $entity)
  {
    $this->entity = $entity;
  }

}
