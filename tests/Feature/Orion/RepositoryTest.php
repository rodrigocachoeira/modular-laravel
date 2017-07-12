<?php

namespace Tests\Orion\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Orion\Core\Business\Repositories\Repository;
use App\Modules\Test\Entities\Repositories\TestRepository;
use App\Modules\Test\Entities\Models\Test;
use DB;

class RepositoryTest extends TestCase
{
    private static $repository;

    public static function setUpBeforeClass()
    {
      self::$repository = new TestRepository(new Test());
    }

    public function testClassShouldBeExists ()
    {
      $this->assertFileExists(base_path('orion/Core/Business/Repositories/Repository.php'));
    }

    public function testRepositoryHasGetMethod ()
    {
      $this->assertTrue(method_exists(Repository::class, 'get'));
    }

    public function testRepositoryGetMethodShouldBeReturnAllRecords ()
    {
      $this->assertCount(DB::table('tests')->count(), self::$repository->get());
    }

    /**
    * @expectedException Exception
    */
    public function testRepositoryGetMethodThrowExceptionWithInvalidColumns ()
    {
        self::$repository->get(['invalid_column']);
    }

    public function testRepositoryHasAllMethod ()
    {
      $this->assertTrue(method_exists(Repository::class, 'all'));
    }

    public function testRepositoryAllMethodShouldBeReturnAllRecords ()
    {
      $this->assertCount(DB::table('tests')->count(), self::$repository->all());
    }

    public function testRepositoryHasByIdMethod ()
    {
      $this->assertTrue(method_exists(Repository::class, 'getById'));
    }

    public function testRepositoryGetByIdMethodShouldBeReturnCorrectRecord ()
    {
      $first = DB::table('tests')->first(['*']);
      return $this->assertEquals($first->id, self::$repository->getById($first->id)->id);
    }

    /**
    * @expectedException Exception
    */
    public function testRepositoryGetByIdMethodThrowExceptionWithInvalidColumns ()
    {
      $first = DB::table('tests')->first(['*']);
      self::$repository->getById($first->id, ['invalid_column']);
    }

}
