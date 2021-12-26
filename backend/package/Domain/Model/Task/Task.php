<?php 

namespace Package\Domain\Model\Task;

class Task
{
  private TaskId $id;
  private TaskName $name;
  private TaskUserId $user_id;

  private function __construct() { }

  public static function create(TaskName $name, TaskUserId $user_id): Task
  {
    $task = new Task();
    $task->name = $name;
    $task->user_id = $user_id;

    return $task;
  }

  public static function reconstruct(TaskId $id, TaskName $name, TaskUserId $user_id): Task
  {
    $task = new Task();
    $task->id = $id;
    $task->name = $name;
    $task->user_id = $user_id;

    return $task;
  }

  public static function update(Task $task, TaskName $name): Task
  {
    $updated_task = $task;
    $updated_task->name = $name;

    return $updated_task;
  }

  public function id()
  {
    return $this->id;
  }

  public function name()
  {
    return $this->name;
  }

  public function userId()
  {
    return $this->user_id;
  }


}