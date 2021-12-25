<?php

namespace App\Http\Controllers\Front\Task;

use App\Http\Controllers\Controller;
use Package\Adapter\Converter\User\UserCreateRequestConverter;
use Package\Application\User\Create\UserCreateUsecase;

class TaskController extends Controller
{
  public function create(UserCreateRequestConverter $input, UserCreateUsecase $usecase)
  {
    $output = $usecase->exec($input);
  }

  public function index() {
    
    return view('task.index');
  }

}
