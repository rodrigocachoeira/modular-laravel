<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Core\Business\Repository\RepositoryInterface;

class RepositoryInterfaceTest extends TestCase
{

  public function testInterfaceShouldBeExists ()
  {
    $this->assertFileExists(app_path('Core/Business/Repository/RepositoryInterface.php'));
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
