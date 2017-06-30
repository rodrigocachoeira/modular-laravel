<?php

namespace App\Modules\Test\Http\Controllers;

use App\Core\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestsController extends Controller
{

  /**
  * @param TestRepository $testRepository
  */
  protected testRepository;

  /**
  * Método Construtor
  *
  * @param TestRepository $testRepository
  */
  public function __construct (TestRepository $testRepository)
  {
    $this->testRepository = $testRepository;
  }

  /**
  * Index Method
  *
  * @return View
  */
  public function index ()
  {
    dd('Render index of admin module');
  }

  /**
  * Store Method
  *
  * @param Request $request
  *
  * @return Response
  */
  public function store (Request $request)
  {
    if ($this->testRepository->save($request->all())) {
      //Success
    }
    //Error
  }

  /**
  * Update Method
  *
  * @param Request $request
  *
  * @return Response
  */
  public function update ($id, $request)
  {
    //TODO
  }

  /**
  * Destroy Method
  *
  * @return Response
  */
  public function destroy ()
  {
    //TODO
  }

  /**
  * Return a specific record
  *
  * @return Object
  */
  public function record ()
  {
    //TODO
  }

  /**
  * Return all records
  *
  * @return Collection
  */
  public function records ()
  {
    //TODO
  }

  /**
  * Return JSON file with all
  * records
  */
  public function json ()
  {
    //TODO
  }

}
