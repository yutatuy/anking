<?php

namespace Package\Application\Task\Edit;

use Package\Domain\Model\Task\TaskName;
use Package\Domain\Model\Task\TaskId;

interface TaskEditInput
{
  public function getTaskName(): TaskName;
  public function getTaskId(): TaskId;
}
