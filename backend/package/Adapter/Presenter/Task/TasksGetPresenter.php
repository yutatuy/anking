<?php

namespace Package\Adapter\Presenter\Task;
use Package\Adapter\ViewModel\Task\TaskViewModel;

class TasksGetPresenter {

  public function exec($output) 
  {
    $task_list = [];
    foreach ($output as $task) {
      $task_list[] = new TaskViewModel($task);
    }
    return view('task.index', compact('task_list'));
  }
}