<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RepositoryTest extends TestCase
{

    public function testClassShouldBeExists ()
    {
      $this->assertFileExists(app_path('Core/Business/Repository/Repository.php'));
    }

}
