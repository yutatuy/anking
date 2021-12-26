<?php

namespace App\Http\Controllers\Front\Task;

use App\Http\Controllers\Controller;
use App\Models\EloquentTask;
use Package\Application\Task\Index\GetTasksUsecase;
use Package\Application\Task\Create\TaskCreateUsecase;
use Package\Adapter\Presenter\Task\GetTasksPresenter;
use Package\Adapter\Converter\Task\TaskCreateRequestConverter;

class TaskController extends Controller
{


  public function index(GetTasksUsecase $usecase, GetTasksPresenter $presenter) {
    $tasks = $usecase->exec();
    return view('task.index', compact('tasks'));
    // $presenter->exec($output);
  }

  public function create(TaskCreateRequestConverter $input, TaskCreateUsecase $usecase)
  {
    $usecase->exec($input);
    return redirect()->route('task.index');
  }

}
