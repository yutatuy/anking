<?php

namespace Package\Application\Task\Show;

use Package\Domain\Model\Task\TaskId;

interface TaskShowInput
{
  public function getTaskId(): TaskId;
}
