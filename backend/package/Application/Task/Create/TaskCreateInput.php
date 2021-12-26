<?php

namespace Package\Application\Task\Create;

use Package\Domain\Model\Task\TaskName;

interface TaskCreateInput
{
  public function getTaskName(): TaskName;
}
