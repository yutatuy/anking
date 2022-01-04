<?php 

namespace Package\Adapter\Converter\Task;

use App\Http\Requests\TaskCreateRequest;
use Package\Application\Task\Create\TaskCreateInput;
use Package\Domain\Model\Task\TaskName;

class TaskCreateRequestConverter implements TaskCreateInput
{
  private $request;

  public function __construct(TaskCreateRequest $input)
  {
    $this->request = $input;
  }

  public function getTaskName(): TaskName
  {
    return new TaskName($this->request->name);
  }
}