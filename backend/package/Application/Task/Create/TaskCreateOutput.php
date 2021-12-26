<?php

namespace Package\Application\Task\Create;

use Package\Domain\Model\Task\Task;

interface TaskCreateOutput
{
  public function getTask(): Task;
}
