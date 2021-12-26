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

  public function getAll() // TODO: 戻り値にははTask型配列を定義
  {
    $eloquent_tasks = $this->task_dao->getAll();
    return $eloquent_tasks; // TODO: クラスの配列をEloquentTaskからTaskに変数処理を記述する
    // return $this->createFromEloquent($eloquent_tasks);
  }

  public function create(Task $task): Task
  {
    $eloquent_task = $this->task_dao->create($task->name()->value(), $task->userId()->value());
    return $this->createFromEloquent($eloquent_task);
  }

  public function findById(TaskId $id): ?Task
  {
    $eloquent_task = $this->task_dao->findById($id->value());
    return $this->createFromEloquent($eloquent_task);
  }

  public function deleteById(TaskId $id)
  {
    $eloquent_task = $this->task_dao->deleteById($id->value());
  }

  private function createFromEloquent(EloquentTask $eloquent_task): Task
  {
    $id = new TaskId($eloquent_task->id);
    $name = new TaskName($eloquent_task->name);
    $user_id = new TaskUserId($eloquent_task->user_id);
    return Task::reconstruct($id, $name, $user_id);
  }
}
