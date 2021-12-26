<?php

namespace Package\Application\Task\Show;

use Package\Domain\Model\Task\Task;
use Package\Application\Task\Show\TaskShowOutput;

class TaskShowUsecaseOutput implements TaskShowOutput
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
