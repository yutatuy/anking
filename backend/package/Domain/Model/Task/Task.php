<?php 

namespace Package\Domain\Model\Task;

class Task
{
  private TaskId $id;
  private TaskName $name;
  private TaskUserId $user_id;

  private function __construct() { }

  public static function create(TaskName $name, TaskUserId $user_id)
  {
    $task = new Task();
    $task->name = $name;
    $task->user_id = $user_id;

    return $task;
  }

  public static function reconstruct(TaskId $id, TaskName $name, TaskUserId $user_id)
  {
    $task = new Task();
    $task->id = $id;
    $task->name = $name;
    $task->user_id = $user_id;

    return $task;
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