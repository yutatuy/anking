<?php

namespace Package\Adapter\Gateway;

use App\Models\EloquentTask;
use Package\Domain\Model\Task\Task;
use Package\Domain\Model\Task\TaskId;
use Package\Domain\Model\Task\TaskName;
use Package\Domain\Model\Task\TaskUserId;
use Package\Domain\Model\Task\TaskRepository;
use Package\Infrastructure\Dao\Eloquent\Task\TaskDao;

class TaskGateway implements TaskRepository
{
  private TaskDao $task_dao;

  public function __construct(TaskDao $task_dao)
  {
    $this->task_dao = $task_dao;
  }

  public function getAll() // Task型配列を定義
  {
    $eloquent_tasks = $this->task_dao->getAll();
    return $eloquent_tasks;
    // return $this->createFromEloquent($eloquent_tasks);
  }

  public function create(Task $task): Task
  {
    $eloquent_task = $this->task_dao->create($task->name()->value(), $task->userId()->value());
    return $this->createFromEloquent($eloquent_task);
  }

  private function createFromEloquent(EloquentTask $eloquent_task): Task
  {
    $id = new TaskId($eloquent_task->id);
    $name = new TaskName($eloquent_task->name);
    $user_id = new TaskUserId($eloquent_task->user_id);
    return Task::reconstruct($id, $name, $user_id);
  }
}
