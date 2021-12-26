<?php

namespace Package\Application\Task\Delete;

use Package\Domain\Model\Task\TaskId;

interface TaskDeleteInput
{
  public function getTaskId(): TaskId;
}
