<?php

namespace Package\Application\Task\Edit;

use Package\Domain\Model\Task\Task;

interface TaskEditOutput
{
  public function getTask(): Task;
}
