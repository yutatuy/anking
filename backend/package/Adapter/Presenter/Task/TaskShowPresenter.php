<?php

namespace Package\Adapter\Presenter\Task;

use Package\Adapter\ViewModel\Task\TaskViewModel;
use Package\Application\Task\Show\TaskShowUsecaseOutput;

class TaskShowPresenter {

  public function exec(TaskShowUsecaseOutput $output)
  {
    $task = new TaskViewModel($output->getTask());
    return view('task.show', compact('task'));
  }
}