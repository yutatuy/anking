<?php

namespace App\Http\Controllers\Front\Task;

use App\Http\Controllers\Controller;
use App\Models\EloquentTask;
use Package\Application\Task\Index\TasksGetUsecase;
use Package\Application\Task\Show\TaskShowUsecase;
use Package\Application\Task\Create\TaskCreateUsecase;
use Package\Application\Task\Delete\TaskDeleteUsecase;
use Package\Application\Task\Edit\TaskEditUsecase;
use Package\Adapter\Converter\Task\TaskCreateRequestConverter;
use Package\Adapter\Converter\Task\TaskDeleteRequestConverter;
use Package\Adapter\Converter\Task\TaskShowRequestConverter;
use Package\Adapter\Converter\Task\TaskEditRequestConverter;
use Package\Adapter\Presenter\Task\TasksGetPresenter;
use Package\Adapter\Presenter\Task\TaskShowPresenter;

class TaskController extends Controller
{
  public function index(TasksGetUsecase $usecase, TasksGetPresenter $presenter) {
    $output = $usecase->exec();
    return $presenter->exec($output);
  }

  public function create(TaskCreateRequestConverter $input, TaskCreateUsecase $usecase)
  {
    $usecase->exec($input);
    return redirect()->route('task.index');
  }

  public function show(TaskShowRequestConverter $input, TaskShowUsecase $usecase, TaskShowPresenter $presenter) {
    $output = $usecase->exec($input);
    return $presenter->exec($output);
  }

  public function update(TaskEditRequestConverter $input, TaskEditUsecase $usecase) {
    $output = $usecase->exec($input);
    $task = $output->getTask();
    return redirect()->route('task.show', ['id' => $task->id()->value()]);
  }

  public function delete(TaskDeleteRequestConverter $input, TaskDeleteUsecase $usecase)
  {
    $usecase->exec($input);
    return redirect()->route('task.index');
  }

}
