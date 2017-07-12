<?php

namespace Tests\Orion\Feature\Repositories;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SendTest extends TestCase
{

  public function testEntitiesExists ()
  {
    $this->assertFileExists(base_path('orion/Mail/Entities/ConfigEmail.php'));
    $this->assertFileExists(base_path('orion/Mail/Entities/ConfigEmailSignature.php'));
  }

  public function testRepositoriesExists ()
  {
    $this->assertFileExists(base_path('orion/Mail/Business/Repositories/ConfigEmailRepository.php'));
    $this->assertFileExists(base_path('orion/Mail/Business/Repositories/ConfigEmailSignatureRepository.php'));
  }

}
