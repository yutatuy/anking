<?php

namespace App\Http\Controllers\Front\Task;

use App\Http\Controllers\Controller;
use App\Models\EloquentTask;
use Package\Application\Task\Index\TasksGetUsecase;
use Package\Application\Task\Show\TaskShowUsecase;
use Package\Application\Task\Create\TaskCreateUsecase;
use Package\Application\Task\Delete\TaskDeleteUsecase;
use Package\Application\Task\Edit\TaskEditUsecase;
use Package\Adapter\Presenter\Task\TasksGetPresenter;
use Package\Adapter\Converter\Task\TaskCreateRequestConverter;
use Package\Adapter\Converter\Task\TaskDeleteRequestConverter;
use Package\Adapter\Converter\Task\TaskShowRequestConverter;
use Package\Adapter\Converter\Task\TaskEditRequestConverter;
use Illuminate\Http\Request;

// TODO: Presenterを何とかする
class TaskController extends Controller
{

  public function index(TasksGetUsecase $usecase, TasksGetPresenter $presenter) {
    $tasks = $usecase->exec();
    return view('task.index', compact('tasks'));
    // $presenter->exec($output);
  }

  public function create(TaskCreateRequestConverter $input, TaskCreateUsecase $usecase)
  {
    $usecase->exec($input);
    return redirect()->route('task.index');
  }

  public function show(TaskShowRequestConverter $input, TaskShowUsecase $usecase) {
    $output = $usecase->exec($input);
    $task = $output->getTask();
    return view('task.show', compact('task'));
  }

  public function edit(TaskEditRequestConverter $input, TaskEditUsecase $usecase) {
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
