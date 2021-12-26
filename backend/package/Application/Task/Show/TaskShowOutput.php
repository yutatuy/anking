<?php

namespace Package\Application\Task\Show;

use Package\Domain\Model\Task\Task;

interface TaskShowOutput
{
  public function getTask(): Task;
}
