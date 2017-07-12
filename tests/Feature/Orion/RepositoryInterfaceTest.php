<?php

namespace Tests\Orion\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Orion\Core\Business\Repositories\RepositoryInterface;

class RepositoryInterfaceTest extends TestCase
{

  public function testInterfaceShouldBeExists ()
  {
    $this->assertFileExists(base_path('orion/Core/Business/Repositories/RepositoryInterface.php'));
  }

  public function testRepositoryHasGetMethod ()
  {
    $this->assertTrue(method_exists(RepositoryInterface::class, 'get'));
  }

  public function testRepositoryHasAllMethod ()
  {
    $this->assertTrue(method_exists(RepositoryInterface::class, 'all'));
  }

  public function testRepositoryHasGetByIdMethod ()
  {
    $this->assertTrue(method_exists(RepositoryInterface::class, 'getById'));
  }

  public function testRepositoryHasGetByFieldMethod ()
  {
    $this->assertTrue(method_exists(RepositoryInterface::class, 'getByField'));
  }

  public function testRepositoryHasLatestMethod ()
  {
    $this->assertTrue(method_exists(RepositoryInterface::class, 'latest'));
  }

  public function testRepositoryHasFirstMethod ()
  {
    $this->assertTrue(method_exists(RepositoryInterface::class, 'first'));
  }

  public function testRepositoryHasLastMethod ()
  {
    $this->assertTrue(method_exists(RepositoryInterface::class, 'last'));
  }

  public function testRepositoryHasWhereMethod ()
  {
    $this->assertTrue(method_exists(RepositoryInterface::class, 'where'));
  }

}
