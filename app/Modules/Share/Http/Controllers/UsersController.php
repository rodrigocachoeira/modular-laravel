<?php

namespace App\Modules\Share\Http\Controllers;

use App\Core\Http\Controllers\Controller;

class UsersController extends Controller
{

  /**
  * @param UserRepository $userRepository
  */
  protected userRepository;

  /**
  * Método Construtor
  *
  * @param UserRepository $userRepository
  */
  public function __construct (UserRepository $userRepository)
  {
    $this->userRepository = $userRepository;
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
  * @return Response
  */
  public function store ()
  {
    //TODO
  }

  /**
  * Update Method
  *
  * @return Response
  */
  public function update ()
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
