<?php

namespace Package\Application\Task\Create;

use Package\Domain\Model\Task\Task;
use Package\Application\Task\Create\TaskCreateOutput;

class TaskCreateUsecaseOutput implements TaskCreateOutput
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
