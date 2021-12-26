<?php

namespace Package\Application\Task\Edit;

use Package\Domain\Model\Task\Task;
use Package\Application\Task\Edit\TaskEditOutput;

class TaskEditUsecaseOutput implements TaskEditOutput
{
  private $task;

  public function __construct(Task $task)
  {
    $this->task = $task;
  }

  public function getTask(): Task 
  {
    return $this->task;
  }
}
