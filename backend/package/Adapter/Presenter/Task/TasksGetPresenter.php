<?php

namespace Package\Adapter\Presenter\Task;
use Package\Adapter\Presenter\JsonPresenter;
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

// JSON用
// class TasksGetPresenter extends JsonPresenter{

//   public function exec($output)
//   {
//     $view_model_list = [];
//     foreach ($output as $task) {
//       $view_model_list[] = new TaskViewModel($task);
//     }

//     return $this->jsonResponse(
//       [
//         'status' => 'success',
//         'tasks' => $view_model_list,
//       ]
//     );

//   }
// }