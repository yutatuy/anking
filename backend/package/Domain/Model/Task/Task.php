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

  public function changeName(TaskName $name): void
  {
    $this->name = $name;
  }

  public function id(): TaskId
  {
    return $this->id;
  }

  public function name(): TaskName
  {
    return $this->name;
  }

  public function userId(): TaskUserId
  {
    return $this->user_id;
  }


}